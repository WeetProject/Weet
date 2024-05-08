<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\LoginLog;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Cache;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cookie;

class GoogleSocialLoginController extends Controller
{
    // 카카오 User Data 저장용
    private $googleData = [
        'googleToken' => '',
        'googleUserEmail' => ''
    ];

    public function googleLogin() 
    {   
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(Request $request) {

        Log::debug("### 리퀘스트 :".$request."###");
        // dd($request);
        $googleUser = Socialite::driver('google')->user();
        Log::debug("유저".json_encode($googleUser));
        
        $googleUserEmail = $googleUser->getEmail();
        Log::debug("### 구글 유저 이메일 : " . $googleUserEmail . " ###");

        try {
            $googleUserConfirm = User::where('user_email', $googleUserEmail)
                            ->first();
            
            Log::debug($googleUserConfirm ? "### 구글 가입 유저 ###" : "### 구글 미가입 유저 ###");
            Log::debug($googleUserEmail);

            // 카카오 가입 여부에 따른 처리
            if(!$googleUserConfirm) {
                $googleUserData = User::create([
                    'user_social_flg' => 2,
                    'user_email' => $googleUserEmail,
                    'password' => 'googleUserPassword',
                    'user_name' => 'googleUserName',
                    'user_birthdate' => '99991231',
                    'user_tel' => '01000000000',
                    'user_gender' => 'MF',
                    'user_postcode' => 123456,
                    'user_basic_address' => 'googleUserBasicAddress',
                    'user_detail_address' => 'googleUserDetailAddress',
                ]);

                Auth::login($googleUserData);
                Log::debug("### 구글 가입 유저 로그인 ###");

                // 로그인 로그 찍기
                LoginLog::create([
                    'user_email' => $googleUserEmail,
                    'login_at' => now(),
                ]);
                
                $this->googleData['googleToken'] = JWTAuth::fromUser($googleUserData);
                $this->googleData['googleUserEmail'] = $googleUserEmail;
                Log::debug("### 구글 유저 토큰 발급 : " . $this->googleData['googleToken'] . " ###");
                Log::debug("### 구글 유저 이메일 발급 : " . $this->googleData['googleUserEmail'] . " ###");
                Log::debug("if 실행");
                Log::debug("### 리턴 데이터 : " . json_encode($this->googleData) . " ###");
                session()->put('googleData', $this->googleData);
                return redirect('/googleLogin');
            } else {
                Auth::login($googleUserConfirm);
                Log::debug("### 구글 가입 유저 로그인 ###");

                // 로그인 로그 찍기
                LoginLog::create([
                    'user_email' => $googleUserEmail,
                    'login_at' => now(),
                ]);

                $this->googleData['googleToken'] = JWTAuth::fromUser($googleUserConfirm);
                $this->googleData['googleUserEmail'] = $googleUserEmail;
                Log::debug("### 구글 유저 토큰 발급 : " . $this->googleData['googleToken'] . " ###");
                // Log::debug("### 리턴 데이터 : " . json_encode($this->googleData) . " ###");
                session()->put('googleData', $this->googleData);
                return redirect('/googleLogin');
            }

        } catch (\Exception $e) {
            // 예외 발생 시 로그에 기록하고 적절한 응답 반환
            Log::error('google login error: ' . $e->getMessage());
            return response()->json([
                'code' => 'GLIERR',
                'message' => '구글 로그인 과정에서 오류가 발생했습니다.'
            ], 500);
        }
    }

    public function googleUserLoginData() {
        $googleData = session()->get('googleData');
        $googleToken = $googleData['googleToken'];
        $googleUserEmail = $googleData['googleUserEmail'];
        // Log::debug("프론트로넘겨줄이메일".$googleUserEmail);

        return response()->json([
            'code' => 'GLI00',
            'googleUserData' => [
                'googleToken' => $googleToken,
                'googleUserEmail' => $googleUserEmail
            ]
        ]);
    }

    public function googleLogout(Request $request) {
        $googleUser = $request->user();

        $token = JWTAuth::getToken();
        Log::debug("로그아웃토큰".$token);
        JWTAuth::invalidate($token);

        Auth::logout($request);
        Log::debug("### Google 로그아웃 : 로그아웃 처리완료 ###");
        Session::flush();
        Log::debug("### Google 로그아웃 : 세션 파기 완료 ###");

        return response()->json([
            'code' => 'GLO00',
        ]);
    }
}
