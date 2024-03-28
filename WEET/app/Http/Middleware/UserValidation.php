<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class UserValidation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    // 미들웨어 생성 명령어
    // php artisan make:middleware 미들웨어명
    public function handle(Request $request, Closure $next)
    {
        // ******************************************로직1****************************************************
        // 유저 정보 목록
        $userBaseKey = [
            'user_email',
            'password',
            'password_chk',
            'user_name',
            'user_gender',
            'user_birthdate',
            'user_tel',
            'user_postcode',
            'user_basic_address',
            'user_detail_address',
        ];

        $arrBaseValidation = [
            'user_email' => 'regex:/^\S+@\S+\.\S+$/'
            ,'password' => 'required|string|min:8|max:16|regex:/^(?=.*[a-zA-Z])(?=.*[!@#]).+$/'
            ,'password_chk' => 'required|string|same:password'
            ,'user_name' => 'required|string|min:2|regex:/^[a-zA-Z가-힣 ]+$/u'
            ,'user_tel' => 'required|string|regex:/^01[016789]\d{7,8}$/'
            ,'user_birthdate' => 'required|date_format:Y-m-d|before_or_equal:today'
            // ,'NewUserPassword' => 'required|string|min:8|max:16|regex:/^(?=.*[a-zA-Z])(?=.*[!@#]).+$/'
            // ,'NewUserPasswordChk' => 'required|string|same:NewUserPassword'
        ];

        $arrRequestParam = [];

        foreach($userBaseKey as $val) {
            // Log::debug("항목 :" .$val);
            if($request->has($val)) {
                $arrRequestParam[$val] = $request->$val;
            } else {
                // 배열 안에 없는 값은 바리데이션에서 제거
                unset($arrBaseValidation[$val]);
            }
            // Log::debug("리퀘스트 파라미터 획득", $arrRequestParam);
            // Log::debug("유효성 체크 리스트 획득", $arrBaseValidation);
        }

        $validator = Validator::make($arrRequestParam, $arrBaseValidation);

        if ($validator->fails()) {
            $errors = [];
            foreach ($validator->errors()->messages() as $field => $messages) {
                $errors[$field] = $messages[0]; // 첫 번째 오류 메시지만 사용
                Log::error("Validation error for field '$field': " . implode(', ', $messages));
            }
        
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $errors,
            ], 400);
        }

        // ******************************************로직2****************************************************
        // Log::debug("### User 유효성 검사 시작 ###");
        // $requestData = $request->all();
        // Log::debug("요청 데이터: " . json_encode($requestData));
        
        // // 회원가입, 로그인 시도 요청 확인
        // $isUserRegisterRequest = $request->isMethod('post') && $request->route()->getName() == 'signup' && $request->has('user_password_chk');
        // // $isUserRegisterRequest = $request->isMethod('post') && $request->route()->getName() == 'signup';
        // $isUserLoginRequest = $request->isMethod('post') && $request->route()->getName() == 'login';
        // Log::debug("### User " .json_encode($isUserRegisterRequest). "###");
        // // Log::debug("### User " .json_encode($isUserLoginRequest). "###");

        // // user 유효성 검사 목록 : 회원가입
        // $userRegisterValidation = [
        //     'user_email' => [
        //         'required',
        //         // 'regex:/^[\w\.-]+@[a-zA-Z\d\.-]+\.[a-zA-Z]{2,}$/',
        //         'regex:/^[\w.-]+@[a-zA-Z\d.-]+\.[a-zA-Z]{2,}$/',
        //         'max:50',
        //         'unique:users,user_email'],
        //     'user_password' => [
        //         'required',
        //         'string',
        //         'min:8',
        //         'regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/',
        //         'max:20',
        //     ],
        //     'user_password_chk' => [
        //         'required',
        //         'string',
        //         'min:8',
        //         'regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/',
        //         'max:20',
        //         'same:user_password',
        //     ],
        //     'user_name' => [
        //         'required', 
        //         'regex:/^[가-힣]{1,50}$/'
        //     ],
        //     // 'user_birthdate' => [
        //     //     'required',
        //     //     'regex:/^(19|20)\d\d(0[1-9]|1[0-2])(0[1-9]|[12][0-9]|3[01])$/',
        //     //     'max:11',
        //     // ],
        //     // 
        //     'user_tel' => [
        //         'required',
        //         // 'in:KT,LGU+,SKT',
        //         'regex:/^01\d{11}$/',
        //     ]
        // ];
        // // user 유효성 검사 목록 : 로그인
        // $userLoginValidation = [
        //     'user_email' => [
        //         'required', 
        //         // 'regex:/^[\w\.-]+@[a-zA-Z\d\.-]+\.[a-zA-Z]{2,}$/',
        //         'regex:/^[\w.-]+@[a-zA-Z\d.-]+\.[a-zA-Z]{2,}$/',
        //     ],
        //     'user_password' => [
        //         'required',
        //         'string',
        //         'regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/',
        //     ],
        // ];
        // // 유효성 검사 선택
        // $userValidation = $isUserRegisterRequest ? $userRegisterValidation : $userLoginValidation;
        // // 유효성 검사 수행
        // $userValidator = Validator::make($request->all(), $userValidation);
        // // 회원가입 또는 로그인에 대한 유효성 검사 수행 여부 확인
        // $isUserRegisterValidation = $isUserRegisterRequest;
        // // 유효성 검사 결과 리턴
        // if ($userValidator->passes()) {
        //     // 유효성 검사 통과 시 로그 남기기
        //     $validatorMsg = $isUserRegisterValidation  ? "회원가입" : "로그인";
        //     Log::debug("### User 유효성 검사 성공: $validatorMsg ###");

        // } else {
        //     $errorMsg = $isUserRegisterValidation ? "회원가입" : "로그인";
        //     $msg = "유효성검사실패";

        //     Log::debug("### User 유효성 검사 실패: $errorMsg ###");
        //     return response()->json([
        //         'code' => $userValidator ? 'uv01' : 'uv02',
        //         'error' => $errorMsg,
        //         'msg' => $msg,
        //         'errors' => $userValidator->errors(),
        //     ], 422);
        // }

        return $next($request);
    }
}
