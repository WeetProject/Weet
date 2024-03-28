<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use App\Models\Reservation;
use Illuminate\Support\Facades\DB;
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
                            ->sum('payment_price');
        Log::debug("### 총 결제 금액 : " . $totalPaymentAmount . " ###");

        // 총 이용자 수
        $totalUser = User::whereNull('deleted_at')
                    ->count();
        Log::debug("### 총 이용자 수 : " . $totalUser . " ###");
        
        return response()->json([
            'code' => 'TD00',
            'totalPayment' => $totalPayment,
            'totalPaymentAmount' => $totalPaymentAmount,
            'totalUser' => $totalUser
        ], 200);
    }

    public function monthlyData() 
    {
        // 통합 데이터(월별 예약 건수, 월별 결제 금액)
        $monthlyReservation = Reservation::select(
                            DB::raw('month(created_at) as month'),
                            DB::raw('count(*) as reservation_count'))
                            ->whereYear('created_at', 2024)
                            ->groupBy(DB::raw('month(created_at)'))
                            ->orderBy(DB::raw('month(created_at)'))
                            ->get();
                        
        $monthlyPaymentAmount = Payment::select(
                        DB::raw('month(created_at) as month'),
                        DB::raw('SUM(payment_price) / 1000000 as total_payment'))
                        ->whereYear('created_at', 2024)
                        ->groupBy(DB::raw('month(created_at)'))
                        ->orderBy(DB::raw('month(created_at)'))
                        ->get();

        Log::debug($monthlyReservation);
        Log::debug($monthlyPaymentAmount);

        return response()->json([
            'code' => 'MD00',
            'monthlyReservation' => $monthlyReservation,
            'monthlyPaymentAmount' => $monthlyPaymentAmount,
        ], 200);
    }
}
