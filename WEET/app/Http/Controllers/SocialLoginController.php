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
    // 카카오로그인
    public function handleKakaoCallback(Request $request)
    {
        // 카카오서버에 유저 있는지 확인하고 변수에 담기
        $kakaoUser = Socialite::driver('kakao')
                ->setHttpClient(new \GuzzleHttp\Client(['verify' => false]))
                ->user();
                
        // 카카오에서 받아오는 정보 확인용
        // dd($kakaoUser);

        $result = User::where('user_email', $kakaoUser->getEmail())->first();

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

            return response()->json(['message' => '새로운 사용자가 생성되었습니다.', 'user' => $kakaoUserData]);

        } else {
            Auth::login($result);

            return response()->json(['message' => '사용자가 로그인되었습니다.', 'user' => $result]);
        }

        return redirect('/welcome'); // 로그인 후 리디렉션할 URL
    }
}
