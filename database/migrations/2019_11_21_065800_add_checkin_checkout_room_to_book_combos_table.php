<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCheckinCheckoutRoomToBookCombosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('book_combos', function (Blueprint $table) {
            //
            $table->dateTime('checkin_time')->nullable();
            $table->dateTime('checkout_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('book_combos', function (Blueprint $table) {
            //
            $table->dropColumn('checkin_time');
            $table->dropColumn('checkout_time');
        });
    }
}
