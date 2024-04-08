<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AdminValidation
{
    public function handle(Request $request, Closure $next)
    {   
        // /admin 접속 시 GET일 때 유효성 검사 진행 패스
        if ($request->isMethod('get')) {
            return $next($request);
        }
        
        Log::debug("### Admin 유효성 검사 시작 ###");

        $requestData = $request->all();
        // Admin 유효성 검사 요청 데이터 확인용 Log
        // Log::debug("### Admin 요청 데이터: " . json_encode($requestData) . "###");
        
        $isAdminSignUpRequest = $request->method() === 'POST' && $request->route()->getName() == 'adminSignUp' && $request->has('password_confirm');

        Log::debug("### Admin 요청: " . ($isAdminSignUpRequest ? "회원가입" : "로그인") . " ###");

        // 유효성 검사 선택(Admin 회원가입 or 로그인)
        $adminValidation = $isAdminSignUpRequest ? $this->adminSignUpValidationRule() : $this->adminLoginValidationRule();

        // 유효성 검사 진행
        $adminValidator = Validator::make($request->all(), $adminValidation);

        // 유효성 검사 결과
        if ($isAdminSignUpRequest) {
            if ($adminValidator->fails()) {
                return $this->adminSignUpValidationFailure($adminValidator);
            }
        } else {
            if ($adminValidator->fails()) {
                return $this->adminLoginValidationFailure($adminValidator);
            }
        }

        // 유효성 검사 결과 LOG
        $adminValidatorMsg = $isAdminSignUpRequest ? "회원가입" : "로그인";
        Log::debug("### Admin 유효성 검사 성공: $adminValidatorMsg ###");

        return $next($request);
    }

    // Admin 회원가입 유효성 검사 규칙
    private function adminSignUpValidationRule() 
    {
        return [
            'admin_number' => [
				'required', 
				'regex:/^1\d{4}$/',
			],
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/',
                'max:20',
            ],
            'password_confirm' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/',
                'max:20',
                'same:password',
            ],
            'admin_name' => [
				'required', 
				'regex:/^[가-힣]{1,50}$/'
			],
        ];
    }

    // 로그인 유효성 검사 규칙
    private function adminLoginValidationRule() 
    {
		return [
            'admin_number' => [
				'required', 
				'regex:/^\d{1,10}$/',
			],
            'password' => [
                'required',
                'string',
                'regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/',
            ],
        ];
    }

    // Admin 회원가입에 대한 유효성 검사 실패 시 처리
    private function adminSignUpValidationFailure($validator)
    {   
        $error = "입력하신 정보를 다시 확인해주세요.";
        $logMessage = "Admin 추가 유효성 검사 실패";
        Log::debug("### $logMessage ###");
        return response()->json([
            'code' => 'AV01',
            'error' => $error
        ], 422);
    }

    // Admin 로그인에 대한 유효성 검사 실패 시 처리
    private function adminLoginValidationFailure($validator)
    {   
        $error = "사번과 비밀번호를 다시 확인해주세요.";
        $logMessage = "Admin 로그인 유효성 검사 실패";
        Log::debug("### $logMessage ###");
        return response()->json([
            'code' => 'AV02',
            'error' => $error
        ], 422);
    }
}

