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
    public function adminSignUp(Request $request) 
    {
        try {
            DB::beginTransaction();
            Log::debug("### Admin가입 : 트랜잭션 시작 ###");

            $signUpAdminAccount = $request->only('admin_number', 'password', 'admin_name');

            // Admin가입 요청 정보 조회
            $confirmsignUpAdminAccount = Admin::where('admin_number', $signUpAdminAccount['admin_number'])->first();

            if($confirmsignUpAdminAccount) {
                $error = "이미 가입된 사원번호입니다. 사원번호를 다시 확인해주세요.";
                log::debug("### Admin가입 : 사원번호 중복 ###");
                return response()->json([
                    'code' => 'ASU01',
                    'error' => $error
                ], 400);
            }
            
            $signUpAdminAccount['password'] = Hash::make($signUpAdminAccount['password']);
            log::debug("### Admin가입 : 비밀번호 암호화 처리 ###");

            $newAdminAccount = Admin::create($signUpAdminAccount);
            log::debug("### Admin가입 : 계정 생성 ###");

            DB::commit();
            log::debug("### Admin가입 : 트랜잭션 종료 ###");

            if($newAdminAccount) {
                $success = 'Admin 계정 승인요청을 보냈습니다.';
                Log::debug("### Admin가입 : 가입완료 ###");
                return response()->json([
                    'code' => 'ASU00',
                    'data' => $newAdminAccount,
                    'success' => $success
                ], 200);
            } else {
                $error = "가입에 실패했습니다. 페이지를 새로고침 후 재가입 요청 해주세요";
                log::debug("### Admin가입 : 예외처리 ###");
                return response()->json([
                    'code' => 'ASU02',
                    'error' => $error
                ], 400);
            }        
        } catch(Exception $e) {
            $error = '가입에 실패했습니다. 페이지를 새로고침 후 재가입 요청 해주세요';
            DB::rollBack();
            log::debug("### Admin가입 : 롤백 완료 ###");
            log::debug("### 롤백 사유 ###" . $e->getMessage());
            return response()->json([
                'code' => 'ASU03',
                'error' => $error
            ], 400);
        }
    }
}