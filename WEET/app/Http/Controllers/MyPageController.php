<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Cache;
use Tymon\JWTAuth\Contracts\JWTSubject;

class MyPageController extends Controller
{
    // 유저 정보
    // public function getMyPageData(Request $requet) {
    public function getMyPageData() {
        
        // Log::debug($request);
        // $userInfo = Auth::user();
        // Log::debug("유저데이터");
        // Log::debug($userInfo);

        // return response()->json($userInfo);

        $userData = User::where('user_email', $request->userEmail)->first();
        Log::debug($userData);

        // $userInfo = Auth::user();
        // Log::debug($userInfo);

        // if ($userInfo) {
        //     // 로그인된 사용자 정보가 있으면 반환
        //     return response()->json([
        //         'success' => true,
        //         'message' => '사용자 정보 조회 성공',
        //         'user' => $userInfo,
        //     ]);
        // } else {
        //     // 로그인된 사용자 정보가 없으면 에러 반환
        //     return response()->json([
        //         'success' => false,
        //         'message' => '사용자 정보를 찾을 수 없습니다.',
        //     ], 401); // 401 Unauthorized 에러 코드 반환
        // }

        // return response()->json([
        //     'userInfo' => $userInfo
        //     ,'userData' => $userData
        // ]);
    }
}
