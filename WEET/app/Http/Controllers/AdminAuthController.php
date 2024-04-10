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
            $maxAdminLoginAttempt = 5;
            // 5회 초과 10분간 로그인 시도 차단(10분)
            $adminLoginLockTime = 60;

            // 로그인 계정 정보 조회
            $loginAdminAccount = Admin::where('admin_number', $request->admin_number)->first();
            // 로그인 요청 정보 확인용 Log
            // Log::debug($loginAdminAccount);

            // 로그인 시도 횟수 확인
            $adminLoginAttempt = Cache::get('Admin로그인시도' . $request->admin_number, 0);
            Log::debug("### 사원번호 {$request->admin_number} 로그인 시도 ###");
            

            // 잠금 처리 된 계정 확인
            if (Cache::has('Admin로그인차단' . $request->admin_number)) {
                $error = "로그인 시도가 너무 많습니다. 약 10분 후 재 로그인해주세요";
                log::debug("### Admin 로그인 실패 : 차단 처리 계정 ###");
            
                return response()->json([
                    'code' => 'ALI01',
                    'error' => $error
                ], 429);
            }

            // 로그인 실패 처리(비밀번호 불일치)
            if (!Hash::check($request->password, $loginAdminAccount->password)) {
                // 로그인 시도 횟수 추가
                Cache::increment('Admin로그인시도' . $request->admin_number);
                $adminLoginAttempt = Cache::get('Admin로그인시도' . $request->admin_number, 0);
                Log::debug("### 사원번호 {$request->admin_number} 로그인 시도 횟수 : $adminLoginAttempt ###");
                $error = "비밀번호를 다시 확인해주세요";
                Log::debug("### Admin인증 실패 : 비밀번호 불일치 ###");

                // 로그인 시도 횟수 초과 차단 처리
                if ($adminLoginAttempt >= $maxAdminLoginAttempt) {
                    Cache::put('Admin로그인차단' . $request->admin_number, true, $adminLoginLockTime);
                    log::debug("### Admin 로그인 실패 : 로그인 시도 횟수 초과(계정 로그인 차단 처리) ###");
                    
                    // 로그인 시도 횟수 초기화
                    Cache::put('Admin로그인시도' . $request->admin_number, 0, $adminLoginLockTime);
                }

                return response()->json([
                    'code' => 'ALI01',
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
                    'code' => 'ALI01',
                    'error' => $error
                ], 400);
            } else if ($adminFlg == 1 || $adminFlg == 2) {
                // sub Admin 또는 root Admin 로그인 처리
                Auth::login($loginAdminAccount);
                
                Log::debug("### Admin인증 성공 : " . ($adminFlg == '1' ? 'sub Admin' : 'root Admin') . " ###");

                // 로그인 시도 횟수 초기화
                Cache::forget('Admin로그인시도' . $request->admin_number);
                Log::debug("### 사원번호 {$request->admin_number} 로그인 시도 횟수 초기화 ###");
                Log::debug("### 사원번호 {$request->admin_number} 로그인 성공 ###");
                
                // 토큰 생성
                $tokenInfo = $request->only('admin_number', 'password');

                try {
                    if (!$token = JWTAuth::attempt($tokenInfo)) {
                        Log::debug("### Admin인증 실패(토큰) : 토큰 생성 실패 ###");
                        $error = "오류가 발생했습니다. 페이지를 새로고침 후 재 로그인해주세요";
                        return response()->json([
                            'code' => 'ALI01',
                            'error' => $error
                        ], 500);
                    }
                    return response()->json([
                        'code' => 'ALI00',
                        'token' => $token,
                        'adminLoginInfo' => [
                            'adminFlg' => $adminFlg,
                            'adminName' => $adminName
                        ]
                    ], 200);
                } catch (JWTException $e) {
                    Log::debug("### Admin인증 실패(토큰) : " . $e->getMessage() .  "###");
                    $error = "오류가 발생했습니다. 페이지를 새로고침 후 재 로그인해주세요";
                    return response()->json([
                        'code' => 'ALI01',
                        'error' => $error
                    ]);
                }
            } 
        } catch (Exception $e) {
            $error = "서버 오류가 발생했습니다. 페이지를 새로고침 후 재 로그인해주세요";
            Log::debug("### Admin인증 실패(예외) : " . $e->getMessage() . "###");
            return response()->json([
                'code' => 'ALI01',
                'error' => $error
            ], 500);
        }  
    }

    public function adminLogout(Request $request) {
        try {
            // Authorization Header 저장
            $logoutDataHeader = $request->header('Authorization');
            // Logout 요청 토큰 데이터 확인용 Log
            Log::debug($logoutDataHeader);

            // Header 내 Bearer 토큰 저장
            $logoutRequestToken = str_replace('Bearer ', '', $logoutDataHeader);
            // Logout 요청 토큰 데이터 저장 확인용 Log
            Log::debug($logoutRequestToken);

            // JWT 토큰 파싱
            $logoutToken = JWTAuth::setToken($logoutRequestToken)->getToken();
            // Logout 요청 토큰 데이터 가공 확인용 Log
            Log::debug($logoutToken);

            if ($logoutToken) {
                // 토큰 무효화
                JWTAuth::invalidate($logoutToken);
                Log::debug("### Admin 로그아웃 : 토큰 무효화 완료 ###");
            } else {
                Log::debug("### Admin 로그아웃 : 토큰 없음 ###");
            }
            
        } catch (Exception $e) {
            $error = "세션이 만료되었습니다. 다시 로그인 해주세요.";
            Log::debug("### 토큰 시간 만료 로그아웃 : " . $e->getMessage() . "###");
            return response()->json([
                'code' => 'ALO01',
                'error' => $error
            ], 401);
        }

        // 로그아웃
        Auth::logout();
        Log::debug("### Admin 로그아웃 : 로그아웃 처리완료 ###");

        // 세션 파기
        Session::flush();
        Log::debug("### Admin 로그아웃 : 세션 파기 완료 ###");

        return response()->json([
            'code' => 'ALO00'
        ], 200)->header('Cache-Control', 'no-cache, no-store, must-revalidate');
    }
}
