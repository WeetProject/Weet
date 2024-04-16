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
        Schema::create('airports', function (Blueprint $table) {
            $table->id('airport_id');
            // airport PK
            // default : big_int, pk, auto_increment

            $table->string('airport_iata_code', 5);
            // airport_iata_code
            // varchar 생성(5) / default : not null

            $table->string('airport_name', 200);
            // airport_name
            // varchar 생성(200) / default : not null

            $table->string('airport_kr_name', 200);
            // airport_kr_name
            // varchar 생성(200) / default : not null

            $table->string('airport_city_name', 200);
            // airport_city_name
            // varchar 생성(200) / default : not null

            $table->string('airport_kr_city_name', 200);
            // airport_kr_city_name
            // varchar 생성(200) / default : not null

            $table->string('airport_country_name', 200);
            // airport_country_name
            // varchar 생성(200) / default : not null

            $table->string('airport_kr_country_name', 200);
            // airport_kr_country_name
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
        Schema::dropIfExists('airports');
    }
};
