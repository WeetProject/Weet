<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\LoginLog;
use App\Mail\VerificationEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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
use Illuminate\Support\Facades\Mail;

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

        // 디테일주소 공백
        if( $data['user_detail_address'] === null ) {
            $data['user_detail_address'] = '상세주소없음';
        }

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
            // Mail::to($userEmail)->send(new VerificationEmail($userEmail));
            return response()->json([
                'message' => true,
            ]);
        }
    }

    // 이메일 인증
    public function emailVerification(Request $request) {
        Log::debug("리퀘스트".$request);

        try {
            $emailVerification = $request->email;
            Log::debug("인증이메일".$emailVerification);

            // 이메일 전송
            // Mail::to($emailVerification)->send(new VerificationEmail($emailVerification));

            // 인증코드 만들기
            $verificationCode = Str::random(6);

            Log::debug("인증코드".$verificationCode);

            $message = "<h3>안녕하세요😄</h3>
                        <p>해당 인증코드를 회원가입 페이지에서 입력해주세요.</p>
                        <p>인증번호</p><h3>$verificationCode</h3>"; // HTML 형식의 메시지

            Mail::html($message, function ($mail) use ($emailVerification) {
                $mail->to($emailVerification)->subject('위트 가입 인증코드'); // 수신자 이메일 주소 및 제목
            });

            // 인증코드 세션에 저장하기
            session(['verificationCode' => $verificationCode]);

            return response()->json([
                'message' => true,
                'verificationCode' => $verificationCode,
            ]);
        } catch(\Exception $e) {
            // 예외 발생 시 로그에 기록하고 적절한 응답 반환
            Log::error('email verification error: ' . $e->getMessage());
            return response()->json([
                'code' => 'EVERR',
                'message' => '이메일 인증 오류가 발생했습니다.'
            ], 500);
        }

        // vue컴포넌트에선 인증코드 확인버튼 눌렀을 때 세션에 저장된 값하고 같은지 확인 후 일치하면 통과
        // 할거많네..
    }

    public function emailVerificationDel(Request $request) {
        Log::debug("이메일확인리퀘스트".$request);
        // 사용자가 제출한 인증코드
        $userVerificationCode = $request->verificationCode;
        Log::debug("생성코드정보".$request->verificationCode);

        // 세션에 저장된 인증코드
        $sessionVerificationCode = session()->get('verificationCode');
        Log::debug("세션코드정보".$sessionVerificationCode);

        // 사용자가 제출한 인증코드와 세션에 저장된 인증코드를 비교하여 일치하는지 확인
        if ($userVerificationCode === $sessionVerificationCode) {
            // 인증 완료
            // 세션에서 인증코드 제거
            session()->forget('verificationCode');

            // 여기에 인증이 완료되었을 때 수행할 작업을 추가합니다.
            // 예를 들어, 회원가입 처리 등을 수행할 수 있습니다.

            return response()->json([
                'message' => '인증이 완료되었습니다.',
            ]);
        } else {
            // 인증 실패
            return response()->json([
                'message' => '인증코드가 올바르지 않습니다.',
            ], 400);
        }
    }

    // 로그인
    public function loginPost(Request $request) {

        // $data = $request->all();
        // Log::debug($request);
        
        // 유저 이메일 정보
        $result = User::where('user_email', $request->userEmail)->first();
        // Log::debug("===========================유저데이터==================");
        // Log::debug($result);


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
        Log::debug("### User PK : " . $result->user_id . " ###");
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
            // Log::debug("토큰오나");
            // Log::debug($token);
            
            if (!$token) {
                // 토큰이 없으면 에러 반환
                return response()->json(['error' => 'Unauthorized'], 401);
            }
            
            // 토큰을 블랙리스트에 추가하여 무효화
            JWTAuth::invalidate($token);
            // Log::debug($token);

            // 로그아웃 처리
            Auth::logout();
            Session::flush();
    
            return response()->json(['message' => 'Success logout']);
        } catch (JWTException $e) {
            // 예외 처리
            return response()->json(['error' => 'Failed logout'], 500);
        }
        
    }

    // 마이페이지
    // 마이페이지 비밀번호 수정
    public function userInfoChange(Request $request) {

        Log::debug("비밀번호변경시작_리퀘스트", [$request->all()]);

        // 사용자 인증 확인
        $userToken = JWTAuth::getToken();
        // Log::debug("비밀번호변경_유저", [$user]);
        $user = User::where('user_email', $request->email)->first();

        if (!$userToken) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // 새로운 비밀번호 설정
        if($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // 주소 변경 요청
        // 해야댐
        $user->user_postcode = $request->userPostcode;
        $user->user_basic_address = $request->userBasicAddress;
        $user->user_detail_address = $request->userDetailAddress;

        $user->save();
        return response()->json(['message' => '비밀번호가 성공적으로 변경되었습니다.'], 200);
    
    }

    // 마이페이지 주소 수정
    // public function userAddressChange(Request $request) {

    //     Log::debug("비밀번호변경시작_리퀘스트", [$request->all()]);

    //     $userAddress = User::where('user_email', $request->email)->first();
    //     Log::debug("비밀번호변경_유저", [$userAddress]);
    // }



}
