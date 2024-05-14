<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class AmadeusTokenController extends Controller
{
    public function amadeusToken() 
    {
        $amadeusResponse = Http::asForm()->post('https://test.api.amadeus.com/v1/security/oauth2/token', [
            'grant_type' => 'client_credentials',
            'client_id' => config('services.amadeus.client_id'),
            'client_secret' => config('services.amadeus.client_secret'),
        ]);
                
        // Amadeus 데이터 송신 확인용 Log
        // log::debug("### Amadeus 토큰 데이터 : " . json_encode($amadeusResponse->json()) . " ###");

        $amadeusToken = $amadeusResponse->json()['access_token'];
        // Amadeus 토큰 확인용 Log
        // log::debug("### Amadeus 액세스 토큰 : " . $amadeusToken . " ###");

        return response()->json([
            'code' => 'AT00',
            'amadeusToken' => $amadeusToken,
        ], 200);
    }
}
