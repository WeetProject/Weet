<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class AdminIndexController extends Controller
{
    public function totalUserData() 
    {
        // 총 결제 건수(항공권, 호텔)
        $totalPayment = Payment::whereNull('deleted_at')
                        ->count();
        Log::debug("### 총 결제 건수 : " . $totalPayment . " ###");

        // 총 결제 금액(항공권, 호텔)
        $totalPaymentAmount = Payment::whereNull('deleted_at')
                            ->sum('payment_postcode');
        Log::debug("### 총 결제 금액 : " . $totalPaymentAmount . " ###");

        // 총 이용자 수
        $totalUser = User::whereNull('deleted_at')
                    ->count();
        Log::debug("### 총 이용자 수 : " . $totalUser . " ###");
        
        // 월별 예약, 월별 결제
    }
}
