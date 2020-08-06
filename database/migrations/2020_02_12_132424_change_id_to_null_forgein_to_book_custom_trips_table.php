<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeIdToNullForgeinToBookCustomTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('book_custom_trips', function (Blueprint $table) {
            //
              $table->bigInteger('room_id')->nullable()->change();
            $table->bigInteger('car_id')->nullable()->change();
            $table->bigInteger('combo_type_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('book_custom_trips', function (Blueprint $table) {
            //
             //
            $table->dropColumn('room_id');
            $table->dropColumn('car_id');
            $table->dropColumn('combo_type_id');
        });
    }
}