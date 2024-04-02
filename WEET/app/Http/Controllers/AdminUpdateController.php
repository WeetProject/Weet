<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminUpdateController extends Controller
{
    public function adminManagementUpdate(Request $request) 
    {
        try {
            DB::beginTransaction();
            Log::debug("### Admin권한 변경 : 트랜잭션 시작 ###");

            // Admin권한 변경 요청 Admin 정보 저장
            $requestAdminInfo = $request
            ->only(
                'admin_number'
            );
            // Admin권한 변경 요청 Admin 정보 조회
            $confirmAdminInfo = Admin::where('admin_number',$requestAdminInfo['admin_number'])->first();

            Log::debug("### Admin권한 요청 플래그 : " . $confirmAdminInfo->admin_flg . " ###");

            if ($confirmAdminInfo->admin_flg === 1) {
                $confirmAdminInfo->admin_flg = 2;
            } else if($confirmAdminInfo->admin_flg === 2) {
                $confirmAdminInfo->admin_flg = 1;
            }

            Log::debug("### Admin권한 변경 플래그 : " . $confirmAdminInfo->admin_flg . " ###");

            // Admin권한 저장
            $confirmAdminInfo->save();
            
            Log::debug("### Admin권한 변경 : 변경완료 ###");
            DB::commit();
            Log::debug("### Admin권한 변경 : 트랜잭션 종료 ###");
            return response()->json([
                'code' => 'AMU00',
                'confirmAdminInfo' => $confirmAdminInfo
            ], 200);
        } catch(Exception $e){
            $error = "오류가 발생했습니다. 페이지를 새로고침 후 재 요청해주세요";
            DB::rollback();
            Log::debug("### Admin권한 변경 : 롤백 완료 ###");
            return response()->json([
                'code' => 'AMU01',
                'error' => $error
            ], 400);
        }
    }

    public function adminRegistrationUpdate(Request $request) 
    {
        try {
            DB::beginTransaction();
            Log::debug("### Admin권한 변경 : 트랜잭션 시작 ###");

            // Admin권한 변경 요청 Admin 정보 저장
            $requestAdminInfo = $request
            ->only(
                'admin_number',
                'admin_flg'
            );
            log::debug($requestAdminInfo);

            if ($requestAdminInfo['admin_flg'] == 1) {
                Log::debug("### Admin권한 요청 플래그 : Sub(1) ###");
            } else if ($requestAdminInfo['admin_flg'] == 2) {
                Log::debug("### Admin권한 요청 플래그 : Admin(2) ###");
            }


            // Admin권한 변경 요청 Admin 정보 조회
            $confirmAdminInfo = Admin::where('admin_number',$requestAdminInfo['admin_number'])->first();

            if ($confirmAdminInfo->admin_flg === 0) {
                Log::debug("### Admin권한 DB 저장 플래그 : 권한 없음(0) ###");
            }
            

            if ($requestAdminInfo['admin_flg'] == 1) {
                $confirmAdminInfo->admin_flg = 1;
            } else if($requestAdminInfo['admin_flg'] == 2) {
                $confirmAdminInfo->admin_flg = 2;
            }

            // Admin권한 저장
            $confirmAdminInfo->save();
            
            if ($confirmAdminInfo['admin_flg'] == 1) {
                Log::debug("### Admin권한 변경 : Sub(1) 변경 완료 ###");
            } else if ($confirmAdminInfo['admin_flg'] == 2) {
                Log::debug("### Admin권한 변경 : Root(2) 변경 완료 ###");
            }

            DB::commit();
            Log::debug("### Admin권한 변경 : 트랜잭션 종료 ###");
            return response()->json([
                'code' => 'ARU00',
                'confirmAdminInfo' => $confirmAdminInfo
            ], 200);
        } catch(Exception $e){
            $error = "오류가 발생했습니다. 페이지를 새로고침 후 재 요청해주세요";
            DB::rollback();
            Log::debug("### Admin권한 변경 : 롤백 완료 ###");
            return response()->json([
                'code' => 'ARU01',
                'error' => $error
            ], 400);
        }
    }

    // todo 0으로 벨류값 넘어오는중 수정해야함
    // 삭제 후 undefind 알러트
}
