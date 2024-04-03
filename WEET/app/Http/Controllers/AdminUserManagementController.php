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
        $userManagementList = User::select(
                            'user_id', 
                            'user_name',
                            'user_email',
                            'user_tel',
                            'user_birthdate',
                            'user_gender',
                            'user_flg',
                            'created_at',
                        DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d') AS user_created_at"))
                        ->whereNull('deleted_at')
                        ->orderByDesc('created_at')
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
                                    ->select('users.user_email', 
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
