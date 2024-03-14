<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    // 회원가입
    public function store(Request $request) {
        
        // 배열에서 가져 올 값 지정. 가지고와야할 유저 정보 담아서 data에 넣어줌.
        $data = $request->only('user_email', 'user_password', 'user_name', 'user_gender', 'user_tel', 'user_postcode', 'user_basic_address', 'user_detail_address',);
        Log::debug("==========================");
        Log::debug("유저데이터");

        // 비밀번호 암호화
        $data['user_password'] = Hash::make($data['user_password']);

        // 유저 데이터 db에 입력
        $result = User::create($data);
        Log::debug("되냐");

        return response()->json(['msg' => '회원가입성공']);
    }


}
