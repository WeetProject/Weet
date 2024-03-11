<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

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
        $admin_flg = Admin::where('admin_id', $result->admin_id)->pluck('admin_flg');

        // 로그인 DB Password 정보 조회
        if ($result && (Hash::check($request->admin_password, $result->admin_password)) && $admin_flg === '0') {
            $errorMsg = "아이디 또는 비밀번호가 일치하지 않습니다";
            return response()->json([
                'code' => 'ad00'
                ,'data' => $result
				,'error' => $errorMsg
            ], 400);  
            Log::debug("### Admin인증 실패 : 아이디 또는 비밀번호 오류 ###");
        } else if($result && (Hash::check($request->admin_password, $result->admin_password)) && $admin_flg === '1') {
			// rootAdmin 로그인 처리
            Auth::login($result);
			// 쿠키생성
			$cookieName = 'admin_id';
			$cookieValue = $result->admin_id;
			// 쿠키 만료시간 60분
			$cookieExpiration = 60;
			$cookie = Cookie::make($cookieName, $cookieValue, $cookieExpiration);

			// 프론트 데이터 전달
            return response()->json([
                'code' => 'ad01'
                ,'data' => $result
				,'cookie' => $cookieValue
            ], 200)->withCookie($cookie);
            Log::debug("### root Admin인증 성공 : main ###");
		} else if($result && (Hash::check($request->admin_password, $result->admin_password)) && $admin_flg === '2') {
            // subAdmin 로그인 처리
            Auth::login($result);
			// 쿠키생성
			$cookieName = 'admin_id';
			$cookieValue = $result->admin_id;
			// 쿠키 만료시간 60분
			$cookieExpiration = 60;
			$cookie = Cookie::make($cookieName, $cookieValue, $cookieExpiration);
            return response()->json([
                'code' => 'ad02'
                ,'data' => $result
				,'cookie' => $cookieValue
            ], 200)->withCookie($cookie);
            Log::debug("### sub Admin인증 성공 : notice ###");
        } else if ($result && (Hash::check($request->admin_password, $result->admin_password)) && $admin_flg === '3') {
            $errorMsg = "승인되지 않은 계정입니다";
            return response()->json([
                'code' => 'ad03'
                ,'data' => $result
				,'error' => $errorMsg
            ], 400);   
            Log::debug("### Admin인증 실패 : 승인되지 않은 계정 ###");
        }  else {
			$errorMsg = "오류가 발생했습니다. 페이지를 새로고침 해주세요";
			return response()->json([
                'code' => 'ad04',
                'error' => $errorMsg
            ], 400);
		}


        // Admin 인증
        

        if(Auth::check()) {
            // 세션 내 Admin_number 저장
            session($result->only('admin_number'));
        } else {
            $errorMsg = '새로고침 후 재로그인 해주세요';
            return view('admin')->withErrors($errorMsg);
            Log::debut("### 세션 저장 실패 - 재로그인 요청 ###");
        }
    }
}
