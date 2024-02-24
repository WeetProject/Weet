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
        Schema::create('wishlist', function (Blueprint $table) {
            $table->id('wishlist_id');
            // 찜목록 PK
            // default : big_int, pk, auto_increment

            $table->integer('wishlist_flg')->default(0);
            // 찜목록 플래그
            // integer 생성 / default : 0

            $table->unsignedBigInteger('wishlist_flight_number');
            // 비행기 고유번호
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
        Schema::dropIfExists('wishlist');
    }
};
