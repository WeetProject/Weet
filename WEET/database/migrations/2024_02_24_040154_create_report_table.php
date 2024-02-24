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
        Schema::create('report', function (Blueprint $table) {
            $table->id('report_id');
            // 신고 제재 PK
            // default : big_int, pk, auto_increment

            $table->unsignedBigInteger('reported_user_pk')->nullable();
            // 신고당한 유저 pk
            // unsignedBigInteger 생성, 양수 정수 한정 / default : not null

            $table->integer('report_flg')->default(0);
            // 제재여부 플래그
            // integer 생성 / default : 0

            $table->unsignedBigInteger('report_user_pk')->nullable();
            // 신고한 유저 pk
            // unsignedBigInteger 생성, 양수 정수 한정 / default : not null

            $table->string('report_reason', 200)->nullable();
            // 신고 사유
            // varchar 생성(200) / default : not null

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
        Schema::dropIfExists('report');
    }
};
