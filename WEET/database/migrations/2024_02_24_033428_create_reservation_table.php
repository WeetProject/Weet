<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation', function (Blueprint $table) {
            $table->id('reservation_id');
            // 예매 PK
            // default : big_int, pk, auto_increment

            $table->unsignedBigInteger('reservation_flight_number');
            // 비행기 고유번호
            // unsignedBigInteger 생성, 양수 정수 한정 / default : not null

            $table->string('reservation_departure_time', 50);
            // 비행기 출발시간
            // varchar 생성(50) / default : not null 

            $table->string('reservation_arrival_time', 50);
            // 비행기 도착시간
            // varchar 생성(50) / default : not null 
            
            $table->timestamps();
            // created_at, updated_at 라라벨 내부 설정 값으로 자동 생성 / default : null

            $table->softDeletes();
            // deleted_at 라라벨 내부 설정 값으로 자동 생성 / default : nullable
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservation');
    }
};
