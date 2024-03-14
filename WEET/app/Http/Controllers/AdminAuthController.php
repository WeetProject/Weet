<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Tymon\JWTAuth\Facades\JWTAuth;

class AdminAuthController extends Controller
{   
    // ### Admin 로그인 ###
	public function adminPostLogin(Request $request) {
        // 로그인 DB Id 정보 조회
        $result = Admin::where('admin_number', $request->admin_number)->first();
        Log::debug("$result");

    	// 로그인 실패 처리
        // if (!$result || !Hash::check($request->admin_password, $result->admin_password)) {
        //     $errorMsg = "아이디 또는 비밀번호가 일치하지 않습니다";
        //     Log::debug("### Admin인증 실패 : 아이디 또는 비밀번호 오류 ###");
        //     return response()->json([
        //         'code' => 'ad00',
        //         'error' => $errorMsg
        //     ], 400);
        // }

        // Admin_flg 저장
        $adminFlg = $result->admin_flg;  

        // 로그인 성공 시 세션 및 토큰 처리
        if ($adminFlg === '0') {
            $errorMsg = "아이디 또는 비밀번호가 일치하지 않습니다";
            Log::debug("### Admin인증 실패 : 아이디 또는 비밀번호 오류 ###");
            return response()->json([
                'code' => 'ad00',
                'error' => $errorMsg
            ], 400);
        } else if ($adminFlg == '1' || $adminFlg == '2') {
            // rootAdmin 또는 subAdmin 로그인 처리
            Auth::login($result);
            $adminToken = JWTAuth::fromUser($result);
            Log::debug("### Admin인증 성공 : " . ($adminFlg == '1' ? 'rootAdmin' : 'subAdmin') . " ###");
            return $this->responseWithToken($adminToken);

            // return response()->json([
            //     'code' => $adminFlg == '1' ? 'ad01' : 'ad02',
            //     'data' => $result,
            //     'token' => $adminToken
            // ], 200);
        } else if ($adminFlg === '3') {
            $errorMsg = "승인되지 않은 계정입니다";
            Log::debug("### Admin인증 실패 : 승인되지 않은 계정 ###");
            return response()->json([
                'code' => 'ad03',
                'error' => $errorMsg
            ], 400);
        } else {
            $errorMsg = "알 수 없는 오류가 발생했습니다";
            Log::debug("### Admin인증 실패 : 알 수 없는 오류 ###");
            return response()->json([
                'code' => 'ad04',
                'error' => $errorMsg
            ], 400);
        }
    }

    ### Admin token 생성 리턴
    private function responseWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::guard('api')
        ]);
    }
}
