<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class AdminAuthController extends Controller
{   
    // 로그인 관련
    public function adminGetLogin() {
        if(Auth::check()) {
            return redirect()->route('main');
            Log::debug("### Admin인증 성공 : main ###");
        }
        return view('admin');
        Log::debug("### Admin인증 실패 : index ###");
    }

    public function adminPostLogin(Request $request) {
        // 로그인 DB Id 정보 조회
        $result = Admin::where('admin_number', $request->admin_number)->first();

        // Admin_flg 저장
        $adminFlg = Admin::where('admin_id', $result->admin_id)->pluck('admin_flg');

        // 로그인 DB Password 정보 조회
        if ($result && (Hash::check($request->admin_password, $result->admin_password)) && $adminFlg === '0') {
            $errorMsg = "아이디 또는 비밀번호가 일치하지 않습니다";
            Log::debug("### Admin인증 실패 : 아이디 또는 비밀번호 오류 ###");
            return response()->json([
                'code' => 'ad00'
				,'error' => $errorMsg
            ], 400);  
        } else if($result && (Hash::check($request->admin_password, $result->admin_password)) && $adminFlg === '1') {
			// rootAdmin 로그인 처리
            Auth::login($result);
            // JWT 토큰 생성
            $adminToken = Auth::guard('admin-api')->login($result);
            Log::debug("### root Admin인증 성공 : main ###");

			// 프론트 데이터 전달
            return response()->json([
                'code' => 'ad01'
                ,'data' => $result
				,'token' => $adminToken
            ], 200);
		} else if($result && (Hash::check($request->admin_password, $result->admin_password)) && $adminFlg === '2') {
            // subAdmin 로그인 처리
            Auth::login($result);
			// JWT 토큰 생성
            $adminToken = Auth::guard('admin-api')->login($result);
            Log::debug("### sub Admin인증 성공 : notice ###");
            return response()->json([
                'code' => 'ad02'
                ,'data' => $result
				,'token' => $adminToken
            ], 200);
        } else if ($result && (Hash::check($request->admin_password, $result->admin_password)) && $adminFlg === '3') {
            $errorMsg = "승인되지 않은 계정입니다";
            Log::debug("### Admin인증 실패 : 승인되지 않은 계정 ###");
            return response()->json([
                'code' => 'ad03'
				,'error' => $errorMsg
            ], 400);   
        }  else {
			$errorMsg = "오류가 발생했습니다. 페이지를 새로고침 해주세요";
            Log::debug("### 예외처리 : 페이지 리로딩 요청 ###");
			return response()->json([
                'code' => 'ad04',
                'error' => $errorMsg
            ], 400);
		}
    }
}
