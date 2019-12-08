<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRoomCarCustomToBookCombosTable extends Migration
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
            $table->bigInteger('room_id')->nullable();
            $table->bigInteger('car_id')->nullable();
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
            $table->dropColumn('room_id');
            $table->dropColumn('car_id');
        });
    }
}
