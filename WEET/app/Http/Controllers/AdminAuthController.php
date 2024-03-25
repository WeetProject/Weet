<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Admin;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Tymon\JWTAuth\Facades\JWTAuth;

class AdminAuthController extends Controller
{   
    // ### Admin 로그인 ###
	public function adminLogin(Request $request) {
        try {
            // 로그인 최대 시도 횟수(5회)
            $maxLoginAttempt = 5;
            // 5회 초과 10분간 로그인 시도 차단(10분)
            $loginLockTime = 600;

            // 실패한 로그인 시도 횟수 확인
            $loginAttempt = Cache::get('로그인시도:' . $request->admin_number, 0);
            Log::debug("### 사원번호 {$request->admin_number} 로그인 시도 횟수: $loginAttempt ###");

            // 로그인 최대 시도 횟수 초과
            if ($loginAttempt > $maxLoginAttempt) {
                $error = "로그인 시도가 너무 많습니다. 약 10분 후 재 로그인해주세요";
                return response()->json([
                    'code' => 'AL05',
                    'error' => $error
                ], 429);
            }
            
            // 로그인 계정 정보 조회
            $loginAdminAccount = Admin::where('admin_number', $request->admin_number)->first();
    
            // 로그인 실패 처리(사번 불일치)
            if (!$loginAdminAccount) {
                // 로그인 시도 횟수 추가
                Cache::increment('로그인시도:' . $request->admin_number);
                $error = "사원번호를 다시 확인해주세요";
                Log::debug("### Admin인증 실패 : 사원번호 불일치 ###");
                return response()->json([
                    'code' => 'AL01',
                    'error' => $error
                ], 400);
            }

            // 로그인 실패 처리(비밀번호 불일치)
            if (!Hash::check($request->admin_password, $loginAdminAccount->admin_password)) {
                // 로그인 시도 횟수 추가
                Cache::increment('로그인시도:' . $request->admin_number);
                $error = "비밀번호를 다시 확인해주세요";
                Log::debug("### Admin인증 실패 : 비밀번호 불일치 ###");
                return response()->json([
                    'code' => 'AL02',
                    'error' => $error
                ], 400);
            }
    
            // Admin_flg 저장
            $adminFlg = $loginAdminAccount->admin_flg;  
    
            // 로그인 성공 시 토큰 처리
            if ($adminFlg === '0') {
                $error = "로그인 권한이 필요합니다.";
                Log::debug("### Admin인증 실패 : 권한 없음 ###");
                return response()->json([
                    'code' => 'AL03',
                    'error' => $error
                ], 400);
            } else if ($adminFlg == '1' || $adminFlg == '2') {
                // sub Admin 또는 root Admin 로그인 처리
                Auth::login($loginAdminAccount);
                // 토큰 생성
                $adminToken = JWTAuth::fromUser($loginAdminAccount);
                Log::debug("### Admin인증 성공 : " . ($adminFlg == '1' ? 'sub Admin' : 'root Admin') . " ###");
                $loginAdminAccountInfo = [
                    'admin_name' => $loginAdminAccount->admin_name,
                    'admin_flg' => $loginAdminAccount->admin_flg
                ];

                // 로그인 시도 횟수 초기화
                Cache::forget('로그인시도:' . $request->admin_number);
    
                return $this->responseWithTokenAndData($adminToken, $loginAdminAccountInfo, 200);
            } 
        } catch (Exception $e) {
            $error = "서버 오류가 발생했습니다. 페이지를 새로고침 후 재 로그인해주세요";
            Log::error('로그인 시 예외 발생: ' . $e->getMessage());
            return response()->json([
                'code' => 'AL04',
                'error' => $error
            ], 500);
        }
    }

    public function adminLogout() {
        try {
            // 사용 중인 토큰 수집
            $adminToken = JWTAuth::parseToken();
            // 토큰 무효화
            $adminToken->invalidate();
        } catch (Exception $e) {
            $error = "로그아웃 중에 오류가 발생했습니다. 페이지를 새로고침 후 재 로그아웃해주세요";
            Log::error('로그아웃 시 예외 발생: ' . $e->getMessage());
            return response()->json([
                'code' => 'AL04',
                'error' => $error
            ], 500);
        }
    
        // 로그아웃
        Auth::logout();
        // 세션 파기
        session_unset();
    
        return response()->json([
            'code' => 'AL00'
        ], 200);
    }

    ### Admin token 생성 리턴
    private function responseWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::guard('api'),
            'code' => 'AL00',
        ]);
    }
}
