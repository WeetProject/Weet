<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Pagination\Paginator;

class AdminRegistrationController extends Controller
{
    public function adminRegistrationList() {
        // 페이징 처리
        $adminRegistrationList = Admin::select(
                            'admin_id',
                            'admin_number', 
                            'admin_name',
                            'admin_flg',
                            'created_at',
                        DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d') AS admin_created_at"))
                        ->whereNull('deleted_at')
                        ->where('admin_flg', '=', 0)
                        ->orderByDesc('created_at')
                        ->paginate(8);         
        
        $error = "오류가 발생했습니다. 페이지를 새로고침 해주세요";

        // 데이터 송신 확인용 Log
        Log::debug($adminRegistrationList);
        return response()->json([
            'code' => 'ARL00',
            'adminRegistrationList' => $adminRegistrationList,
            'error' => $error
        ], 200);
    }
}
