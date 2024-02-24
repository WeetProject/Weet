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
        Schema::create('seats', function (Blueprint $table) {
            $table->id('seats_id');
            // 좌석 PK
            // default : big_int, pk, auto_increment

            $table->unsignedBigInteger('seats_flight_number');
            // 비행기 고유번호
            // unsignedBigInteger 생성, 양수 정수 한정 / default : not null

            $table->unsignedBigInteger('seats_number');
            // 좌석 수
            // unsignedBigInteger 생성, 양수 정수 한정 / default : not null
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
        Schema::dropIfExists('seats');
    }
};
