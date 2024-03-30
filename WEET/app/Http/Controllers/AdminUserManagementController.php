<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Pagination\Paginator;

class AdminUserManagementController extends Controller
{
    public function userManagementList() {
        // 페이징 처리
        $userManagementList = User::select(
                            'user_id', 
                            'user_name',
                            'user_email',
                            'user_tel',
                            'user_gender',
                            'user_flg',
                            'created_at',
                        DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d') AS user_created_at"))
                        ->whereNull('deleted_at')
                        ->orderByDesc('created_at')
                        ->paginate(8);         
        
        $error = "오류가 발생했습니다. 페이지를 새로고침 해주세요";

        Log::debug($userManagementList);
        return response()->json([
            'code' => 'UML00',
            'userManagementList' => $userManagementList,
            'error' => $error
        ], 200);
    }
}
