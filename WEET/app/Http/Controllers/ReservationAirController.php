<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class ReservationAirController extends Controller
{
    // 예약완료기능
    public function reservationAirPost(Request $req){
        Log::debug($req->arrivalAirport1);
        try {
            $reservationData = $req->only(
                'reservation_last_name',
                'reservation_first_name',
                'reservation_gender',
                'reservation_birth_date',
                'reservation_country',
                'reservation_id_card',
                'reservation_passport_num',
                'reservation_passport_date',
                'reservation_full_name',
                'reservation_email',
                'reservation_phone',
                'reservation_refund_flg',
                'reservation_insurance_flg',
            );
            // 유저아이디 없으니 테스트로 1 대입
            $reservationData['user_id'] = '1';
            $reservationData['reservation_flight_number'] = $req->reservation_flight_number1;
            $reservationData['reservation_departure_airport'] = $req->reservation_departure_airport1;
            $reservationData['reservation_departure_time'] = $req->reservation_departure_time1;
            $reservationData['reservation_arrival_airport'] = $req->reservation_arrival_airport1;
            $reservationData['reservation_arrival_time'] = $req->reservation_arrival_time1; 
            $reservationData['reservation_ticket_price'] = $req->reservation_ticket_price1; 
            DB::beginTransaction();
            $result = Reservation::create($reservationData);
            if(!empty($req->reservation_flight_number2)){
                $secReservationData =  $reservationData;
                $secReservationData['reservation_flight_number'] = $req->reservation_flight_number2;
                $secReservationData['reservation_departure_airport'] = $req->reservation_departure_airport2;
                $secReservationData['reservation_departure_time'] = $req->reservation_departure_time2;
                $secReservationData['reservation_arrival_airport'] = $req->reservation_arrival_airport2;
                $secReservationData['reservation_arrival_time'] = $req->reservation_arrival_time2;
                $secReservationData['reservation_ticket_price'] = $req->reservation_ticket_price2; 
                $result2 = Reservation::create($secReservationData);
            };
            DB::commit();
            return response()->json([
                'code' => '0'
            ], 200);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json([
                'code' => 're01',
                'errorMsg' => '예약에 실패하였습니다.'
            ], 400);
        }

    }
}
