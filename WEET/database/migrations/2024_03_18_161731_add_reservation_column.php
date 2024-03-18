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
            $table->string('reservation_last_name',50)->after('reservation_arrival_time');
            $table->string('reservation_first_name',50)->after('reservation_last_name');
            $table->char('reservation_gender',1)->after('reservation_first_name');
            $table->char('reservation_birth_date',8)->after('reservation_gender');
            $table->string('reservation_nationality',50)->after('reservation_birth_date');
            $table->string('reservation_id_card',50)->after('reservation_nationality');
            $table->string('reservation_passport_num',15)->after('reservation_id_card');
            $table->char('reservation_passport_date',8)->after('reservation_passport_num');
            $table->string('reservation_full_name',50)->after('reservation_passport_date');
            $table->string('reservation_email',50)->after('reservation_full_name');
            $table->char('reservation_phone',11)->after('reservation_email');
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
