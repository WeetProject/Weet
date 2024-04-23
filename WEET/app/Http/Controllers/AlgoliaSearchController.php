<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Airport;

class AlgoliaSearchController extends Controller
{   
    // 출발지 연관 검색어 송신
    public function startingPointSuggestion(Request $request)
    {   
        try {
            // 출발지 검색어 저장 
            $startingPointQuery = trim($request->input('query'));
            Log::debug("### 출발지 검색 Query : " . $startingPointQuery . " ###");

            if($startingPointQuery) {
                // Algolia 데이터 저장
                $startingPointQuerySuggestion = Airport::search($startingPointQuery)
                                                ->raw();
                $startingPointQueryData = [];
                // Algolia 데이터 hits 리턴
                foreach ($startingPointQuerySuggestion['hits'] as $hit) {
                    $startingPointQueryData[] = [
                        'airport_kr_city_name' => $hit['airport_kr_city_name'],
                        'airport_city_name' => $hit['airport_city_name'],
                        // 'airport_kr_country_name' => $hit['airport_kr_country_name'],
                    ];
                }

                // Algolia 데이터 송신 확인용 Log
                // Log::debug("### 출발지 Algolia Data : " . json_encode($destinationQueryData) . " ###");

                return response()->json([
                    'code' => 'SPS00',
                    'startingPointQueryData' => $startingPointQueryData
                ], 200);
            } else {
                Log::debug("검색어 없음");
                $error = "검색어를 입력해주세요";
                return response()->json([
                    'code' => 'SA01',
                    'error' => $error
                ], 200);
            }
        } catch(\Exception $e) {
            Log::debug($e);
            $error = "새로고침 필요";
                return response()->json([
                    'code' => 'SA02',
                    'error' => $error
                ], 500);
        }            
    }

    // 도착지 연관 검색어 송신
    public function destinationSuggestion(Request $request)
    {   
        try {
            // 출발지 검색어 저장 
            $destinationQuery = trim($request->input('query'));
            Log::debug("### 출발지 검색 Query : " . $destinationQuery . " ###");

            if($destinationQuery) {
                // Algolia 데이터 저장
                $destinationQuerySuggestion = Airport::search($destinationQuery)
                                                ->raw();
                $destinationQueryData = [];
                // Algolia 데이터 hits 리턴
                foreach ($destinationQuerySuggestion['hits'] as $hit) {
                    $destinationQueryData[] = [
                        'airport_kr_city_name' => $hit['airport_kr_city_name'],
                        'airport_city_name' => $hit['airport_city_name'],
                        // 'airport_kr_country_name' => $hit['airport_kr_country_name'],
                    ];
                }

                // Algolia 데이터 송신 확인용 Log
                // Log::debug("### 출발지 Algolia Data : " . json_encode($destinationQueryData) . " ###");

                return response()->json([
                    'code' => 'DS00',
                    'destinationQueryData' => $destinationQueryData
                ], 200);
            } else {
                Log::debug("검색어 없음");
                $error = "검색어를 입력해주세요";
                return response()->json([
                    'code' => 'DS01',
                    'error' => $error
                ], 200);
            }
        } catch(\Exception $e) {
            Log::debug($e);
            $error = "새로고침 필요";
                return response()->json([
                    'code' => 'DS02',
                    'error' => $error
                ], 500);
        }            
    }
}
