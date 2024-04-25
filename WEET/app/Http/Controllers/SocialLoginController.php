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

class SocialLoginController extends Controller
{   
    public function kakaoLogin() 
    {
        return Socialite::driver('kakao')->redirect();
    }
    // 카카오로그인
    public function handleKakaoCallback(Request $request)
    {
        // dd($request);

        try {
            // 카카오서버에 유저 있는지 확인하고 변수에 담기
            // 실제 운영에서는 보안을 위해 사용하지 않는 것이 좋다고 함.
            // 해석 : 카카오 서비스로부터 사용자 정보를 가져오는 코드
            $kakaoUser = Socialite::driver('kakao')
                    ->setHttpClient(new \GuzzleHttp\Client(['verify' => false]))
                    ->user();
                    
            // 카카오에서 받아오는 정보 확인용
            // dd($kakaoUser);

            $result = User::where('user_email', $kakaoUser->getEmail())
                            ->first();
            $kakaoUserToken = $kakaoUser->token;

            // 로그인 전 카카오 유저 정보
            Log::debug("로그인 전 카카오 유저 정보: " . $result);

            // 카카오로그인하는 이메일이 기존 회원인지 아닌지 확인하는 분기
            if(!$result) {
                $kakaoUserData = User::create([
                    'user_social_flg' => 1,
                    'user_email' => $kakaoUser->getEmail(),
                    'password' => 'kakaoUserPassword',
                    'user_name' => 'kakaoUserName',
                    'user_birthdate' => '99991231',
                    'user_tel' => '01000000000',
                    'user_gender' => 'MF',
                    'user_postcode' => 123456,
                    'user_basic_address' => 'kakaoUserBasicAddress',
                    'user_detail_address' => 'kakaoUserDetailAddress',
                ]);

                return response()->json([
                    'code' => 'KLI00',
                    'message' => '새로운 사용자가 생성되었습니다.', 
                    'user' => $kakaoUserData
                ]);

                // ### json 데이터는 리턴 오기 때문에 
                // 해당 json 데이터를 뷰에서 처리해야함
                // 예를 들어 리턴에 성공 코드를 리턴해서 
                // 코드를 기반으로 if 분기로써 카카오 로그인 데이터를 state에 저장하여 
                // 그 정보를 토대로 로그인처리를 진행
                // 성공 코드 예시 KLI00
                // 추가로 유저 jwt토큰 발급하여 리턴 추가
            } else {
                Auth::login($result);
                Log::debug("카카오아이디가있을때 저장되었을 때 유저정보" . $result);

                // $kakaoToken = JWTAuth::fromUser($result);
                // Log::debug("==== 토큰생성 ====");
                // Log::debug($kakaoToken);

                // 로그인된 사용자에 대한 토큰 생성
                // $kakaoToken = Auth::user()->createToken('Kakao Token')->accessToken;

                $kakaoToken = $kakaoUserToken;
                Log::debug("카카오토큰" . $kakaoToken);

                // 로그인 로그 찍기
                LoginLog::create([
                    'user_email' => $result->user_email,
                    'login_at' => now(),
                ]);

                // return response()->json([
                //     'code' => 'KLI01',
                //     'kakaoUserEmail' => $result->user_email,
                //     'kakaoToken' => $kakaoToken
                // ]);
                return redirect('/')->with(['kakaoToken' => $kakaoToken]);
            }
        } catch (\Exception $e) {
            // 예외 발생 시 로그에 기록하고 적절한 응답 반환
            Log::error('Kakao login error: ' . $e->getMessage());
            return response()->json([
                'code' => 'KLIERR',
                'message' => '카카오 로그인 과정에서 오류가 발생했습니다.'
            ], 500);
        }

        // return redirect('/welcome'); // 로그인 후 리디렉션할 URL
    }
}
