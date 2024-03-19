<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\payment;
use App\Models\Reservation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    // 결제기능
    public function paymentPost(Request $req){
        try {
            Log::debug($req->reservation_flight_number1);  
            $reservation_id = 
                Reservation::select('reservation_id')
                    ->where('reservation_flight_number',$req->reservation_flight_number1)
                    ->where('reservation_departure_airport',$req->reservation_departure_airport1)
                    ->where('reservation_departure_time',$req->reservation_departure_time1)
                    ->orderBy('created_at', 'desc')
                    ->first();
            Log::debug($reservation_id->reservation_id);
            $paymentData = $req->only('payment_flg');
            $paymentData['user_id'] = '1';
            $paymentData['reservation_id'] = $reservation_id->reservation_id;
            $paymentData['payment_price'] = $req->payment_price1;
            DB::beginTransaction();
            $result = payment::create($paymentData);
            if(!empty($req->reservation_flight_number2)){
                $sec_reservation_id = Reservation::select('reservation_id')
                    ->where('reservation_flight_number',$req->reservation_flight_number2)
                    ->where('reservation_departure_airport',$req->reservation_departure_airport2)
                    ->where('reservation_departure_time',$req->reservation_departure_time2)
                    ->orderBy('created_at', 'desc')
                    ->first();
                Log::debug($sec_reservation_id);
                $secPaymentData = $req->only('payment_flg');
                $secPaymentData['user_id'] = '1';
                $secPaymentData['reservation_id'] = $sec_reservation_id->reservation_id;
                $secPaymentData['payment_price'] = $req->payment_price2;
                $result2 = payment::create($secPaymentData);
            };
            DB::commit();
            return response()->json([
                'code' => '0'
            ], 200);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json([
                'code' => 'pa01',
                'errorMsg' => '결제정보 등록에 실패하였습니다.'
            ], 400);
        }
    }
}
