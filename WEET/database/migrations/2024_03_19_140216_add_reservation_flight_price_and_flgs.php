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
        Schema::table('reservation', function (Blueprint $table) {
            $table->string('reservation_ticket_price',50)->after('reservation_arrival_time');
            $table->char('reservation_refund_flg',1)->after('reservation_arrival_time');
            $table->char('reservation_insurance_flg',1)->after('reservation_refund_flg');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
