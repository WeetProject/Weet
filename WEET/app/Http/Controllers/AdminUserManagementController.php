<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Payment;
use App\Models\Reservation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Pagination\Paginator;

class AdminUserManagementController extends Controller
{       
    // 최신 가입 순
    public function userManagementList() {
        $userManagementList = DB::table('users')
                        ->select(
                            'users.user_id',
                            'users.user_name',
                            'users.user_email',
                            'users.user_tel',
                            'users.user_birthdate',
                            'users.user_gender',
                            'users.user_flg',
                            'users.created_at',
                            DB::raw("DATE_FORMAT(users.created_at, '%Y-%m-%d') AS user_created_at"),
                            'login_logs.login_at AS last_login_at'
                        )
                        ->leftJoin('login_logs', 'users.user_email', '=', 'login_logs.user_email')
                        ->whereNull('users.deleted_at')
                        ->orderByDesc('users.created_at')
                        ->paginate(8);
        
        $error = "오류가 발생했습니다. 페이지를 새로고침 해주세요";
        // 데이터 송신 확인용 Log
        // Log::debug($userManagementList);
        return response()->json([
            'code' => 'UML00',
            'userManagementList' => $userManagementList,
            'error' => $error
        ], 200);
    }

    // 최신 결제 순
    public function userManagementPaymentList() {
        $userManagementPaymentList = DB::table('users')
                                    ->join('reservation', 'users.user_id', '=', 'reservation.user_id')
                                    ->join('payment', 'users.user_id', '=', 'payment.user_id')
                                    ->select('users.user_id',
                                            'users.user_email', 
                                            'users.user_name', 
                                            'users.user_tel', 
                                            'reservation.reservation_departure_airport', 
                                            'reservation.reservation_departure_time', 
                                            'reservation.reservation_arrival_airport', 
                                            'reservation.reservation_arrival_time', 
                                            'payment.payment_price',
                                            DB::raw("DATE_FORMAT(payment.created_at, '%Y-%m-%d') AS payment_created_at"))
                                    ->whereNull('payment.deleted_at')
                                    ->orderByDesc('payment.created_at')
                                    ->paginate(8);    
    
        $error = "오류가 발생했습니다. 페이지를 새로고침 해주세요";
        // 데이터 송신 확인용 Log
        // Log::debug($userManagementPaymentList);
        return response()->json([
        'code' => 'UMPL00',
        'userManagementPaymentList' => $userManagementPaymentList,
        'error' => $error
        ], 200);
    }
}
