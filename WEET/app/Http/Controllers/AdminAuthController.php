<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Admin;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AdminAuthController extends Controller
{   
    // ### Admin 로그인 ###
	public function adminLogin(Request $request) {
        $loginAdminAccount = Admin::where('admin_number', $request->admin_number)->first();

        if (!$loginAdminAccount) {
            return response()->json("Admin account not found", 404);
        }

        $credentials = [
            'admin_number' => $loginAdminAccount->admin_number,
            'admin_password' => $loginAdminAccount->admin_password,
        ];

        log::debug($credentials);
        
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json("Failed to create token", 500);
            }
            return response()->json($token);
        } catch (JWTException $e) {
            return response()->json($e->getMessage());
        }

        return response()->json(compact('token'));
    }

    public function adminLogout() {
        try {
            // 사용 중인 토큰 수집
            $adminToken = JWTAuth::parseToken();
            // 토큰 무효화
            $adminToken->invalidate();
        } catch (Exception $e) {
            $error = "로그아웃 중에 오류가 발생했습니다. 페이지를 새로고침 후 재 로그아웃해주세요";
            Log::error('로그아웃 시 예외 발생: ' . $e->getMessage());
            return response()->json([
                'code' => 'AL04',
                'error' => $error
            ], 500);
        }
    
        // 로그아웃
        Auth::logout();
        // 세션 파기
        Session::flush();
    
        return response()->json([
            'code' => 'AL00'
        ], 200);
    }

    ### Admin token 생성 리턴
    // protected function responseWithToken($token)
    // {
    //     return response()->json([
    //         'access_token' => $token,
    //         'token_type' => 'bearer',
    //         'expires_in' => JWTAuth::factory()->getTTL() * 60,
    //         'code' => 'AL00',
    //     ]);
    // }
}
