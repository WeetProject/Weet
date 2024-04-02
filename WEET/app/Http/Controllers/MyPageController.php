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
    public function getMyPageData(Request $request) {
    // public function getMyPageData() {
        
        Log::debug($request);
        // $userID = $request->header('userID');
        // Log::debug($userID);

        // $userInfo = User::where('user_id', $request->header('userID'))->first();
        // Log::debug("유저데이터");
        // Log::debug($userInfo);

        // return response()->json([
        //     'userInfo' => $userInfo
        //     ,'userData' => $userData
        // ]);
    }
}
