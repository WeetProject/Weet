<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\LoginLog;
use Illuminate\Http\Request;
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

class UserController extends Controller
{
    // 회원가입
    public function store(Request $request) {
        
        // 배열에서 가져 올 값 지정. 가지고와야할 유저 정보 담아서 data에 넣어줌.
        $data = $request->only('user_email', 'password', 'user_name', 'user_gender', 'user_tel', 'user_postcode', 'user_basic_address', 'user_detail_address', 'user_birthdate');
        Log::debug("==========================");
        Log::debug("유저데이터");

        // 비밀번호 암호화
        $data['password'] = Hash::make($data['password']);

        // 유저 데이터 db에 입력
        $result = User::create($data);
        Log::debug("되냐");

        return response()->json(['msg' => '회원가입성공']);
    }

    // 이메일 중복체크
    public function emailDoubleChk(Request $request) {

        $userEmail = $request->input('user_email');
        Log::debug("==============이메일============");
        Log::debug($userEmail);

        $result = User::where('user_email', $userEmail)->first();
        Log::debug("==============체크한이메일============");
        Log::debug($result);

        if ($result) {
            return response()->json([
                'message' => false,
            ]);
        } else {
            return response()->json([
                'message' => true,
            ]);
        }
    }

    // 로그인
    public function loginPost(Request $request) {

        // $data = $request->all();
        Log::debug($request);
        
        // 유저 이메일 정보
        $result = User::where('user_email', $request->userEmail)->first();
        Log::debug("===========================유저데이터==================");
        Log::debug($result);


        // 유저 비밀번호 체크
        if(!$result || !(Hash::check($request->userPassword, $result->password))) {
            return response()->json([
                'success' => false,
                'message' => '아이디와 비밀번호를 확인해주세요.',
            ]);
        }

        // 유저 인증 작업
        Auth::login($result);

        $controllerToken = JWTAuth::fromUser($result);
        Log::debug("==== 토큰생성 ====");
        Log::debug($controllerToken);
        // $userEmail = $result->user_email;
        Log::debug($result->user_id);
        // $tokenInfo = $result->only('user_email', 'password');

        // 로그인 로그 찍기
        LoginLog::create([
            'user_email' => $result->user_email,
            'login_at' => now(),
        ]);
        
        // 토큰 저장한번해봄
        // $saveToken = User::find($result->user_id);
        // $saveToken->remember_token = $controllerToken;
        // $saveToken->save();
        
        // Log::debug("토큰정보");
        // Log::debug($tokenInfo);
        return response()->json([
            'success' => true,
            'message' => '사용자 로그인 성공',
            'token' => $controllerToken,
            'userID' => $result->user_id,
            // 'userData' => $result,
            'userData' => [
                'userEmail' => $result->user_email, 
                'userName' => $result->user_name,
                'userTel' => $result->user_tel,
                'userGender' => $result->user_gender,
                'userBirthDate' => $result->user_birthdate,
                'userPostcode' => $result->user_postcode,
                'userBasicAddress' => $result->user_basic_address,
                'userDetailAddress' => $result->user_detail_address,
            ],
        ]);


        // todo 
        // 필요한 추가데이터 넘겨주기, 로컬스토리지 토큰, 추가데이터 저장
        // 리멤버 토큰에 토큰 저장
        // 로그아웃시 user 테이블 리멤버 토큰 초기화
        // 1. 프론트에서 디코드 사용해서 정보 사용
        // 2. 리멤버 토큰 사용(저장 후 로그아웃하면 null로 초기화)
        
        }
    

    // 로그아웃
    // public function logout(Request $request) {

    //     Log::debug("**************로그인정보*************");
    //     Log::debug($request);

    //     // 로그아웃 처리
    //     Auth::logout();

    //     $sessionDataCheck = Auth::check();

    //     return response()->json([
    //         'message' => '로그아웃 성공',
    //         'sessionDataCheck' => $sessionDataCheck,
    //     ]);
    // }

    public function logout() {

        // Log::debug("**************로그아웃정보*************");
        // Log::debug($request);

        // $sessionDataCheck = Auth::check();
        
        // Log::debug("**************세션데이터*************");
        // Log::debug($sessionDataCheck);

        // return response()->json([
        //     'message' => '로그아웃 성공',
        //     'sessionDataCheck' => $sessionDataCheck,
        // ]);

        try {
            // $logoutHeader = $request->header('Authorization');

            // 현재 사용자의 토큰 가져오기
            $token = JWTAuth::getToken();
            Log::debug("토큰오나");
            Log::debug($token);
            
            if (!$token) {
                // 토큰이 없으면 에러 반환
                return response()->json(['error' => 'Unauthorized'], 401);
            }
            
            // 토큰을 블랙리스트에 추가하여 무효화
            JWTAuth::invalidate($token);
            Log::debug($token);

            // 로그아웃 처리
            Auth::logout();
            Session::flush();
    
            return response()->json(['message' => 'Success logout']);
        } catch (JWTException $e) {
            // 예외 처리
            return response()->json(['error' => 'Failed logout'], 500);
        }
        
    }

    // 유저를 kakao인증페이지로 리다이렉트하는 함수
    // 유저가 kakao계정으로 인증하면 설정해둔 Redirect URI로 다시 보냄.
    // 그럼 여기서 weet회원인지 아닌지 확인하는 분기 만들면되나?
    // public function redirectToKakao()
    // {
    //     return Socialite::driver('kakao')
    //         ->with(['prompt' => 'consent'])
    //         ->redirect();
    // }

    // 
    public function handleKakaoCallback(Request $request)
    {
        
        // $kakaoUserEmail = $kakaoUser->

        $kakaoUser = Socialite::driver('kakao')
                ->setHttpClient(new \GuzzleHttp\Client(['verify' => false]))
                ->user();
        // 기존 세션 정보 삭제
        // session()->forget('kakaoUser');
        dd($kakaoUser);

        Log::debug("카카오유저데이터");
        Log::debug($kakaoUser);

        $user = User::where('provider_id', $kakaoUser->id)->first();

        if (!$user) {
            // 카카오 사용자 정보로 새로운 사용자 생성
            $user = User::create([
                'name' => $kakaoUser->name,
                'email' => $kakaoUser->email,
                'provider' => 'kakao',
                'provider_id' => $kakaoUser->id,
                // 다른 필드들을 필요에 따라 추가할 수 있습니다.
            ]);
        }

        Auth::login($user, true);

        return redirect('/welcome'); // 로그인 후 리디렉션할 URL
    }

    public function handleKakaoLogin() {
        
    }

}
