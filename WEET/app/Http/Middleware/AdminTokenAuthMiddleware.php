<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Models\Admin;

class AdminTokenAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {   
        // Admin 유효성 검사
        Log::debug("### Admin 유효성 검사 시작 ###");

        // Admin 유효성 검사 목록 : 회원가입
        $adminRegisterValidation = [
            'admin_number' => [
				'required', 
				'regex:/^\d{1,10}$/', 
				'unique:Admin,admin_number'
			],
            'admin_password' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/',
                'max:20',
            ],
            'admin_password_confirm' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/',
                'max:20',
                'same:admin_password',
            ],
            'admin_name' => [
				'required', 
				'regex:/^[\p{Hangul}]{1,5}$/u'
			],
        ];

		$adminLoginValidation = [
            'admin_number' => [
				'required', 
				'regex:/^\d{1,10}$/',
			],
            'admin_password' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/',
                'max:20',
            ],
        ];

		$registerValidation  = Validator::make($request->all(), $adminRegisterValidation);
		$loginValidation = Validator::make($request->all(), $adminLoginValidation);

		if ($registerValidation->fails()) {
			// 회원가입 유효성 검사 실패
			Log::debug("### Admin 유효성 검사 실패 ###");
			$errorMsg = "Admin 회원가입 유효성 검사 실패";
			return response()->json([
				'code' => 'val01',
				'error' => $errorMsg
			], 422);
		} else if ($loginValidation->fails()) {
			// 로그인 유효성 검사 실패
			Log::debug("### Admin 유효성 검사 실패 ###");
			$errorMsg = "Admin 로그인 유효성 검사 실패";
			return response()->json([
				'code' => 'val02',
				'error' => $errorMsg
			], 422);
		}

        // Admin 인증확인
        if (!auth('admin-api')->check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $next($request);
    }

}
