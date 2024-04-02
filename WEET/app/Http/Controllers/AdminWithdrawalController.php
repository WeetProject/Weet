<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminWithdrawalController extends Controller
{
    public function adminManagementWithdrawal(Request $request) 
    {
        try {
            DB::beginTransaction();
            Log::debug("### 트랜잭션 시작 ###");

            // Admin삭제 요청 Admin 정보 저장
            $requestAdminInfo = $request
            ->only(
                'admin_number',
            );

            // Admin삭제 요청 Admin정보 조회
            $confirmAdminInfo = Admin::where('admin_number', $requestAdminInfo['admin_number'])->first();
            
            if ($confirmAdminInfo) {
                $confirmAdminInfo->delete();
                Log::debug("### Admin 계정삭제 : 삭제완료 ###");
                DB::commit();
                Log::debug("### Admin 계정삭제 : 트랜잭션 종료 ###");
                return response()->json([
                    'code' => 'AW00',
                    'confirmAdminInfo' => $confirmAdminInfo
                ], 200);
            }
            
        } catch (Exception $e) {
            $error = '오류가 발생했습니다. 페이지를 새로고침 후 다시 시도해주세요.';
            DB::rollback();
            Log::debug("### Admin 계정삭제 : 롤백 완료 ###");
            Log::debug("### 예외발생 : 롤백완료 ###" . $e->getMessage());
            return response()->json([
                'code' => 'AMW01', 
                'error' => $error
            ], 400);
        } 
    }

    public function adminRegistrationWithdrawal(Request $request) 
    {
        try {
            DB::beginTransaction();
            Log::debug("### 트랜잭션 시작 ###");

            // Admin삭제 요청 Admin 정보 저장
            $requestAdminInfo = $request
            ->only(
                'admin_number',
            );

            // Admin삭제 요청 Admin정보 조회
            $confirmAdminInfo = Admin::where('admin_number', $requestAdminInfo['admin_number'])->first();
            
            if ($confirmAdminInfo) {
                $confirmAdminInfo->delete();
                Log::debug("### Admin 계정삭제 : 삭제완료 ###");
                DB::commit();                
                $success = 'Admin 계정 가입이 거부되었습니다.';
                Log::debug("### Admin 계정삭제 : 트랜잭션 종료 ###");
                return response()->json([
                    'code' => 'ARW00',
                    'success' => $success,
                    'confirmAdminInfo' => $confirmAdminInfo
                ], 200);
            }
            
        } catch (Exception $e) {
            $error = '오류가 발생했습니다. 페이지를 새로고침 후 다시 시도해주세요.';
            DB::rollback();
            Log::debug("### Admin 계정삭제 : 롤백 완료 ###");
            Log::debug("### 예외발생 : 롤백완료 ###" . $e->getMessage());
            return response()->json([
                'code' => 'ARW01',
                'error' => $error
            ], 400);
        } 
    }
}
