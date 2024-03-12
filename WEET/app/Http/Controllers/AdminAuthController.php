<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminAuthController extends Controller
{   
    // 로그인 관련
    public function adminGetLogin() {
        return view('admin');
    }

	public function adminPostLogin(Request $request) {
        // 로그인 DB Id 정보 조회
        $result = Admin::where('admin_number', $request->admin_number)->first();
    	// 로그인 실패 처리
        if (!$result || !Hash::check($request->admin_password, $result->admin_password)) {
            $errorMsg = "아이디 또는 비밀번호가 일치하지 않습니다";
            Log::debug("### Admin인증 실패 : 아이디 또는 비밀번호 오류 ###");
            return response()->json([
                'code' => 'ad00',
                'error' => $errorMsg
            ], 400);
        }
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
            $adminToken = Auth::guard('admin-api')->login($result);
            Log::debug("### Admin인증 성공 : " . ($adminFlg == '1' ? 'rootAdmin' : 'subAdmin') . " ###");
            return response()->json([
                'code' => $adminFlg == '1' ? 'ad01' : 'ad02',
                'data' => $result,
                'token' => $adminToken
            ], 200);
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
}
