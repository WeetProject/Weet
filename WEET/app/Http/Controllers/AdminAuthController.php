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
use Tymon\JWTAuth\Exceptions\JWTException;

class AdminAuthController extends Controller
{   
    // ### Admin 로그인 ###
	public function adminLogin(Request $request) {
        try {
            // 로그인 최대 시도 횟수(5회)
            $maxAdminLoginAttempt = 6;
            // 5회 초과 10분간 로그인 시도 차단(10분)
            $adminLoginLockTime = 600;

            // 실패한 로그인 시도 횟수 확인
            $adminLoginAttempt = Cache::get('Admin로그인시도' . $request->admin_number, 1);
            Log::debug("### 사원번호 {$request->admin_number} 로그인 시도 횟수: $adminLoginAttempt ###");

            // 로그인 최대 시도 횟수 초과
            if ($adminLoginAttempt > $maxAdminLoginAttempt) {
                Cache::put('Admin로그인차단' . $request->admin_number, true, $adminLoginLockTime);
                $error = "로그인 시도가 너무 많습니다. 약 10분 후 재 로그인해주세요";
                return response()->json([
                    'code' => 'ALI01',
                    'error' => $error
                ], 429);
            }

            // 로그인 최대 시도 횟수 초과 계정 확인
            $adminLoginAttemptBlock = Cache::get('Admin로그인차단계정' . $request->admin_number, false);
            if ($adminLoginAttemptBlock) {
                // 사용자가 차단 중인 경우
                $error = "로그인 시도가 너무 많습니다. 약 10분 후 재 로그인해주세요";
                // 429 catch 데이터 리턴
                return response()->json([
                    'code' => 'ALI01',
                    'error' => $error
                ], 429);
            }
            
            // 로그인 계정 정보 조회
            $loginAdminAccount = Admin::where('admin_number', $request->admin_number)->first();
            Log::debug($loginAdminAccount);
    
            // 로그인 실패 처리(사번 불일치)
            if (!$loginAdminAccount) {
                // 로그인 시도 횟수 추가
                Cache::increment('Admin로그인시도' . $request->admin_number);
                $adminLoginAttempt = Cache::get('Admin로그인시도' . $request->admin_number, 0);
                Log::debug("### 사원번호 {$request->admin_number} 로그인 시도 횟수: $adminLoginAttempt ###");
                $error = "사원번호를 다시 확인해주세요";
                Log::debug("### Admin인증 실패 : 사원번호 불일치 ###");
                return response()->json([
                    'code' => 'ALI03',
                    'error' => $error
                ], 400);
            }

            // 로그인 실패 처리(비밀번호 불일치)
            if (!Hash::check($request->password, $loginAdminAccount->password)) {
                // 로그인 시도 횟수 추가
                Cache::increment('Admin로그인시도' . $request->admin_number);
                $error = "비밀번호를 다시 확인해주세요";
                Log::debug("### Admin인증 실패 : 비밀번호 불일치 ###");
                return response()->json([
                    'code' => 'ALI04',
                    'error' => $error
                ], 400);
            }            
    
            // Admin_flg 저장
            $adminFlg = $loginAdminAccount->admin_flg;
            // Admin_name 저장
            $adminName = $loginAdminAccount->admin_name;
    
            // 로그인 성공 시 토큰 처리
            if ((int)$adminFlg === 0) {
                $error = "로그인 권한이 필요합니다.";
                // 로그인 시도 횟수 추가
                Cache::increment('Admin로그인시도' . $request->admin_number);
                Log::debug("### Admin인증 실패 : 권한 없음 ###");
                return response()->json([
                    'code' => 'ALI05',
                    'error' => $error
                ], 400);
            } else if ($adminFlg == 1 || $adminFlg == 2) {
                // sub Admin 또는 root Admin 로그인 처리
                Auth::login($loginAdminAccount);
                // 토큰 생성
                Log::debug("### Admin인증 성공 : " . ($adminFlg == '1' ? 'sub Admin' : 'root Admin') . " ###");

                // 로그인 시도 횟수 초기화
                Cache::forget('Admin로그인시도' . $request->admin_number);
                Log::debug("### 사원번호 {$request->admin_number} 로그인 시도 횟수: $adminLoginAttempt 초기화 ###");

                $tokenInfo = $request->only('admin_number', 'password');

                try {
                    if (!$token = JWTAuth::attempt($tokenInfo)) {
                        Log::debug("### Admin인증 실패(토큰) : 토큰 생성 실패 ###");
                        $error = "오류가 발생했습니다. 페이지를 새로고침 후 재 로그인해주세요";
                        return response()->json([
                            'code' => 'ALI06',
                            'error' => $error
                        ], 500);
                    }
                    return response()->json([
                        'code' => 'ALI00',
                        'token' => $token,
                        'adminFlg' => $adminFlg,
                        'adminName' => $adminName
                    ], 200);
                } catch (JWTException $e) {
                    Log::debug("### Admin인증 실패(토큰) : " . $e->getMessage() .  "###");
                    $error = "오류가 발생했습니다. 페이지를 새로고침 후 재 로그인해주세요";
                    return response()->json([
                        'code' => 'ALI07',
                        'error' => $error
                    ]);
                }
            } 
        } catch (Exception $e) {
            $error = "서버 오류가 발생했습니다. 페이지를 새로고침 후 재 로그인해주세요";
            Log::debug("### Admin인증 실패(예외): " . $e->getMessage() . "###");
            return response()->json([
                'code' => 'ALI08',
                'error' => $error
            ], 500);
        }  
    }

    public function adminLogout() {
        try {
            // 사용 중인 토큰 수집
            $adminToken = JWTAuth::getToken();
            Log::debug($adminToken);
            if ($adminToken) {
                // 토큰 무효화
                JWTAuth::invalidate($adminToken);
                Log::debug("### Admin 로그아웃 : 토큰 무효화 완료 ###");
            } else {
                Log::debug("### Admin 로그아웃 : 토큰 없음 ###");
            }
            
        } catch (Exception $e) {
            $error = "로그아웃 중에 오류가 발생했습니다. 페이지를 새로고침 후 재 로그아웃해주세요";
            Log::debug("### 로그아웃 시 예외 발생: " . $e->getMessage() . "###");
            return response()->json([
                'code' => 'ALO01',
                'error' => $error
            ], 500);
        }    
        // 로그아웃
        Auth::logout();
        Log::debug("### Admin 로그아웃 : 로그아웃 처리완료 ###");
        // 세션 파기
        Session::flush();
        Log::debug("### Admin 로그아웃 : 세션 파기 완료 ###");
        return response()->json([
            'code' => 'ALO00'
        ], 200);
    }
}
