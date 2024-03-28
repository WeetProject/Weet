<?php

namespace App\Http\Controllers;

use App\Models\User;
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

        $token = JWTAuth::fromUser($result);
        Log::debug("토큰");
        Log::debug($token);

        return response()->json([
            'success' => true,
            'message' => '사용자 로그인 성공',
            'token' => $token,
        ]);

        // 유저 인증 작업
        // Auth::login($result);
        // session(['user' => $result]);
        // session()->save();

        $userEmail = $result->user_email;

        $tokenInfo = $result->only('user_email', 'password');
        Log::debug("토큰정보");
        Log::debug($tokenInfo);
        // todo 
        // 필요한 추가데이터 넘겨주기, 로컬스토리지 토큰, 추가데이터 저장
        // 리멤버 토큰에 토큰 저장
        // 로그아웃시 user 테이블 리멤버 토큰 초기화
        try {
            $token = JWTAuth::fromUser($result);
            return response()->json([
                'code' => 'ALI00',
                'token' => $token,
                'user_email' => $userEmail,
            ], 200);
        // JWT 실패======================================================
        // $credentials = $result->only('user_email', 'password');
        // Log::debug("cred");
        // Log::debug($credentials);

        // try {

        //     if (!$token = JWTAuth::attempt($credentials)) {
        //         Log::debug("토큰");
        //         Log::debug($token);

        //         return response()->json([
        //             'result' => false,
        //             'code' => 401,
        //             'message' => '이메일 또는 비밀번호가 올바르지 않습니다.'
        //         ]);
        //     }

        //     return response()->json([
        //         'code' => 'ALI00',
        //         'token' => $token,
        //         'user_email' => $request->user_email,
        //     ], 200);

        // } catch (JWTException $e) {
        //     Log::debug("### User인증 실패(토큰) : " . $e->getMessage() .  "###");
        //     $error = "오류가 발생했습니다. 페이지를 새로고침 후 재 로그인해주세요";
        //     return response()->json([
        //         'code' => 'ALI07',
        //         'error' => $error
        //     ]);
        // }
        // JWT 실패======================================================

        // $userId = Auth::id();
        // $userEmail = Auth::user()->user_email;
        // Log::debug($userId);
        // Log::debug($userEmail);

        // if (Auth::check()) {

        //     $sessionDataCheck = Auth::check();
        //     Log::debug($sessionDataCheck);

        //     return response()->json([
        //         'success' => true,
        //         'message' => '로그인이 성공적으로 수행되었습니다.',
        //         'sessionDataCheck' => $sessionDataCheck,
        //         'userId' => $userId,
        //         'userEmail' => $userEmail, 
        //     ]);
        // } else {
        //     return response()->json([
        //         'success' => false,
        //         'message' => '인증 에러가 발생했습니다.',
        //     ]);
        // }
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

        Log::debug("**************로그인정보*************");
        // Log::debug($request);

        // 로그아웃 처리
        Auth::logout();

        $sessionDataCheck = Auth::check();
        
        Log::debug("**************세션데이터*************");
        Log::debug($sessionDataCheck);

        return response()->json([
            'message' => '로그아웃 성공',
            'sessionDataCheck' => $sessionDataCheck,
        ]);
    }

}
