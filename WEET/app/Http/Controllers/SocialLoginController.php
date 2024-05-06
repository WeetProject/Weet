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

class SocialLoginController extends Controller
{   
    // 카카오 User Data 저장용
    private $kakaoData = [
        'kakaoToken' => '',
        'kakaoUserEmail' => ''
    ];

    public function kakaoLogin() 
    {   
        return Socialite::driver('kakao')->redirect();
    }

    // 0425 여중기 카카오 콜백 메소드 작성
    public function handleKakaoCallback(Request $request)
    {
        Log::debug("### 리퀘스트 :".$request."###");
        // dd($request);
        // 카카오 인가 코드 저장
        $code = $request->input('code');
        Log::debug("### 카카오 인가 코드 : " . $code . " ###");

        // 카카오 인가 코드 사용하여 액세스 토큰 요청
        $kakaoResponse = Http::asForm()->post('https://kauth.kakao.com/oauth/token', [
            'grant_type' => 'authorization_code',
            'client_id' => config('services.kakao.client_id'),
            'redirect_uri' => config('services.kakao.redirect'),
            'code' => $code,
        ]);

        Log::debug("### 카카오 토큰 데이터 : " . json_encode($kakaoResponse->json()) . " ###");

        $kakaoAccessToken = $kakaoResponse->json()['access_token'];

        Log::debug("### 카카오 엑세스 토큰 : " . $kakaoAccessToken . " ###");

        // 액세스 토큰을 사용하여 사용자 정보 요청
        $kakaoUserResponse = Http::withToken($kakaoAccessToken)->get('https://kapi.kakao.com/v2/user/me');
        $kakaoUserInfo = $kakaoUserResponse->json();
        // Log::debug("### 카카오 유저 데이터 ###");
        // Log::debug($kakaoUserInfo);

        $this->kakaoData['kakaoUserEmail'] = $kakaoUserInfo['kakao_account']['email'];
        Log::debug("### 카카오 유저 이메일 : " . $this->kakaoData['kakaoUserEmail'] . " ###");

        try {
            $kakaoUserConfirm = User::where('user_email', $this->kakaoData['kakaoUserEmail'])
                            ->first();
            
            Log::debug($kakaoUserConfirm ? "### 카카오 가입 유저 ###" : "### 카카오 미가입 유저 ###");

            // 카카오 가입 여부에 따른 처리
            if(!$kakaoUserConfirm) {
                $kakaoUserData = User::create([
                    'user_social_flg' => 1,
                    'user_email' => $kakaoUserEmail,
                    'password' => 'kakaoUserPassword',
                    'user_name' => 'kakaoUserName',
                    'user_birthdate' => '99991231',
                    'user_tel' => '01000000000',
                    'user_gender' => 'MF',
                    'user_postcode' => 123456,
                    'user_basic_address' => 'kakaoUserBasicAddress',
                    'user_detail_address' => 'kakaoUserDetailAddress',
                ]);

                Auth::login($kakaoUserConfirm);
                Log::debug("### 카카오 가입 유저 로그인 ###");

                // 로그인 로그 찍기
                LoginLog::create([
                    'user_email' => $this->kakaoData['kakaoToken'],
                    'login_at' => now(),
                ]);

                $kakaoToken = $kakaoAccessToken;
                Log::debug("### 카카오 토큰 : " . $kakaoToken . " ###");
                
                $this->kakaoData['kakaoToken'] = JWTAuth::fromUser($kakaoUserData);
                Log::debug("### 카카오 유저 토큰 발급 : " . $newToken . " ###");
                Log::debug("if 실행");
                Log::debug("### 리턴 데이터 : " . json_encode($this->kakaoData) . " ###");
                session()->put('kakaoData', $this->kakaoData);
                return redirect('/kakaoLogin');
            } else {
                Auth::login($kakaoUserConfirm);
                Log::debug("### 카카오 가입 유저 로그인 ###");

                // 로그인 로그 찍기
                LoginLog::create([
                    'user_email' => $this->kakaoData['kakaoToken'],
                    'login_at' => now(),
                ]);

                $kakaoToken = $kakaoAccessToken;
                Log::debug("### 카카오 토큰 : " . $kakaoToken . " ###");

                $this->kakaoData['kakaoToken'] = JWTAuth::fromUser($kakaoUserConfirm);
                Log::debug("### 카카오 유저 토큰 발급 : " . $this->kakaoData['kakaoToken'] . " ###");
                // Log::debug("### 리턴 데이터 : " . json_encode($this->kakaoData) . " ###");
                session()->put('kakaoData', $this->kakaoData);
                return redirect('/kakaoLogin');
            }

        } catch (\Exception $e) {
            // 예외 발생 시 로그에 기록하고 적절한 응답 반환
            Log::error('Kakao login error: ' . $e->getMessage());
            return response()->json([
                'code' => 'KLIERR',
                'message' => '카카오 로그인 과정에서 오류가 발생했습니다.'
            ], 500);
        }
    }

    public function kakaoUserLoginData() {
        $kakaoData = session()->get('kakaoData');
        $kakaoToken = $kakaoData['kakaoToken'];
        $kakaoUserEmail = $kakaoData['kakaoUserEmail'];

        return response()->json([
            'code' => 'KLI00',
            'kakaoUserData' => [
                'kakaoToken' => $kakaoToken,
                'kakaoUserEmail' => $kakaoUserEmail
            ]
        ]);
    }

    public function kakaoLogout(Request $request) {
        $kakaoUser = $request->user();
        // Log::debug("세션 정보: " . json_encode($request->session()->all()));
        $token = JWTAuth::getToken();
        JWTAuth::invalidate($token);

        Auth::logout($request);
        Log::debug("### kakao 로그아웃 : 로그아웃 처리완료 ###");
        Session::flush();
        Log::debug("### kakao 로그아웃 : 세션 파기 완료 ###");

        return response()->json([
            'code' => 'KLO00',
        ]);
    }

    // ### 현희 ###
    // 카카오로그인
    // public function handleKakaoCallback(Request $request)
    // {
    //     dd($request);

    //     try {
    //         // 카카오서버에 유저 있는지 확인하고 변수에 담기
    //         // 실제 운영에서는 보안을 위해 사용하지 않는 것이 좋다고 함.
    //         // 해석 : 카카오 서비스로부터 사용자 정보를 가져오는 코드
    //         $kakaoUser = Socialite::driver('kakao')
    //                 ->setHttpClient(new \GuzzleHttp\Client(['verify' => false]))
    //                 ->user();
                    
    //         // 카카오에서 받아오는 정보 확인용
    //         // dd($kakaoUser);

    //         $result = User::where('user_email', $kakaoUser->getEmail())
    //                         ->first();
    //         $kakaoUserToken = $kakaoUser->token;

    //         // 로그인 전 카카오 유저 정보
    //         Log::debug("로그인 전 카카오 유저 정보: " . $result);

    //         // 카카오로그인하는 이메일이 기존 회원인지 아닌지 확인하는 분기
    //         if(!$result) {
    //             $kakaoUserData = User::create([
    //                 'user_social_flg' => 1,
    //                 'user_email' => $kakaoUser->getEmail(),
    //                 'password' => 'kakaoUserPassword',
    //                 'user_name' => 'kakaoUserName',
    //                 'user_birthdate' => '99991231',
    //                 'user_tel' => '01000000000',
    //                 'user_gender' => 'MF',
    //                 'user_postcode' => 123456,
    //                 'user_basic_address' => 'kakaoUserBasicAddress',
    //                 'user_detail_address' => 'kakaoUserDetailAddress',
    //             ]);

    //             return response()->json([
    //                 'code' => 'KLI00',
    //                 'message' => '새로운 사용자가 생성되었습니다.', 
    //                 'user' => $kakaoUserData
    //             ]);

    //             // ### json 데이터는 리턴 오기 때문에 
    //             // 해당 json 데이터를 뷰에서 처리해야함
    //             // 예를 들어 리턴에 성공 코드를 리턴해서 
    //             // 코드를 기반으로 if 분기로써 카카오 로그인 데이터를 state에 저장하여 
    //             // 그 정보를 토대로 로그인처리를 진행
    //             // 성공 코드 예시 KLI00
    //             // 추가로 유저 jwt토큰 발급하여 리턴 추가
    //         } else {
    //             Auth::login($result);
    //             Log::debug("카카오아이디가있을때 저장되었을 때 유저정보" . $result);

    //             // $kakaoToken = JWTAuth::fromUser($result);
    //             // Log::debug("==== 토큰생성 ====");
    //             // Log::debug($kakaoToken);

    //             // 로그인된 사용자에 대한 토큰 생성
    //             // $kakaoToken = Auth::user()->createToken('Kakao Token')->accessToken;

    //             $kakaoToken = $kakaoUserToken;
    //             Log::debug("카카오토큰" . $kakaoToken);

    //             // 로그인 로그 찍기
    //             LoginLog::create([
    //                 'user_email' => $result->user_email,
    //                 'login_at' => now(),
    //             ]);

    //             // return response()->json([
    //             //     'code' => 'KLI01',
    //             //     'kakaoUserEmail' => $result->user_email,
    //             //     'kakaoToken' => $kakaoToken
    //             // ]);
    //             return redirect('/')->with(['kakaoToken' => $kakaoToken]);
    //         }
    //     } catch (\Exception $e) {
    //         // 예외 발생 시 로그에 기록하고 적절한 응답 반환
    //         Log::error('Kakao login error: ' . $e->getMessage());
    //         return response()->json([
    //             'code' => 'KLIERR',
    //             'message' => '카카오 로그인 과정에서 오류가 발생했습니다.'
    //         ], 500);
    //     }

    //     // return redirect('/welcome'); // 로그인 후 리디렉션할 URL
    // }
}