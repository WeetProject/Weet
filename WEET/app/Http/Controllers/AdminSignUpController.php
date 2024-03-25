<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminSignUpController extends Controller
{
    public function adminSignup(Request $request) 
    {
        try {
            DB::beginTransaction();
            Log::debug("### Admin가입 : 트랜잭션 시작 ###");

            $adminSignUpinfo = $request->only('admin_number');

            // Admin가입 요청 정보 조회
            $confirmAdminSignUpInfo = Admin::where('admin_number', $adminSignUpinfo['admin_number'])->first();

            // Admin_number 중복 여부 확인
            if($confirmAdminSignUpInfo) {
                $error = '이미 등록된 사원번호입니다.';
                log::debug("### Admin가입 : 사원번호 중복 ###");
                return response()->json([
                    'code' => 'as01',
                    'data' => $confirmAdminSignUpInfo,
                    'error' => $error
                ], 400);
            } else {
                $success = '사용 가능한 사원번호입니다.';
                return response()->json([
                    'code' => 'as00',
                    'data' => $confirmAdminSignUpInfo,
                    'success' => $success
                ], 200);
            }

            $adminSignUpinfo['admin_password'] = Hash::make($adminSignUpinfo['admin_password']);
            log::debug("### Admin가입 : 비밀번호 암호화 처리 ###");

            $newAdminAccount = Admin::create($adminSignUpinfo);
            log::debug("### Admin가입 : 계정 생성 ###");

            DB::commit();
            log::debug("### Admin가입 : 트랜잭션 종료 ###");

            if($newAdminAccount) {
                $success = 'Admin 계정이 생성되었습니다.';
                Log::debug("### Admin가입 : 가입완료 ###");
                return response()->json([
                    'code' => 'as00',
                    'data' => $newAdminAccount,
                    'success' => $success
                ], 200);
            } else {
                $error = '가입에 실패했습니다. 페이지를 새로고침 후 재가입 요청 해주세요';
                log::debug("### Admin가입 : 예외처리 ###");
                return response()->json([
                    'code' => 'as02',
                    'error' => $error
                ], 400);
            }
        } catch(Exception $e) {
            $errorMsg = '가입에 실패했습니다. 페이지를 새로고침 후 재가입 요청 해주세요';
            DB::rollBack();
            log::debug("### Admin가입 : 롤백 완료 ###");
            log::debug("### 롤백 사유 ###" . $e->getMessage());
            return response()->json([
                'code' => 'as03',
                'error' => $errorMsg
            ], 400);
        }
    }
}