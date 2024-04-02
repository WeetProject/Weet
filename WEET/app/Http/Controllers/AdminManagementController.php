<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Pagination\Paginator;

class AdminManagementController extends Controller
{
    public function adminManagementList() {
        // 페이징 처리
        $adminManagementList = Admin::select(
                            'admin_id',
                            'admin_number', 
                            'admin_name',
                            'admin_flg',
                            'created_at',
                        DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d') AS admin_created_at"))
                        ->whereNull('deleted_at')
                        ->where('admin_flg', '!=', 0)
                        ->orderByDesc('created_at')
                        ->paginate(8);         
        
        $error = "오류가 발생했습니다. 페이지를 새로고침 해주세요";

        // 데이터 송신 확인용 Log
        // Log::debug($adminManagementList);
        return response()->json([
            'code' => 'AML00',
            'adminManagementList' => $adminManagementList,
            'error' => $error
        ], 200);
    }

    public function adminManagementFlgList() {
        $adminManagementFlgList = Admin::select(
                                'admin_id',
                                'admin_number', 
                                'admin_name',
                                'admin_flg',
                                'created_at',
                            DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d') AS admin_created_at"))
                            ->whereNull('deleted_at')
                            ->where('admin_flg', '!=', 0)
                            ->orderBy('admin_flg', 'DESC')
                            ->orderBy('created_at', 'DESC')
                            ->paginate(8);
                            
        $error = "오류가 발생했습니다. 페이지를 새로고침 해주세요";

        // 데이터 송신 확인용 Log
        // Log::debug($adminManagementFlgList);
        return response()->json([
            'code' => 'AMFL00',
            'adminManagementFlgList' => $adminManagementFlgList,
            'error' => $error
        ], 200);
    }
}
