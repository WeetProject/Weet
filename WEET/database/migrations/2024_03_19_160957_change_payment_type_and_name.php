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
        Schema::table('payment', function (Blueprint $table) {
            $table->renameColumn('payment_postcode', 'payment_price');
        });
        DB::statement("ALTER TABLE payment MODIFY payment_price integer NOT NULL");
        DB::statement("ALTER TABLE payment MODIFY payment_flg char(1) NOT NULL");
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
