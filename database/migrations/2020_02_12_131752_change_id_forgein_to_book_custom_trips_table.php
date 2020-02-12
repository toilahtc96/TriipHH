<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeIdForgeinToBookCustomTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('book_custom_trips', function (Blueprint $table) {
           
            $table->dropForeign(['room_id']);

            $table->dropForeign(['car_id']);
            $table->dropForeign(['combo_type_id']);

          
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
            // $table->dropColumn('room_id');
            // $table->dropColumn('car_id');
            // $table->dropColumn('combo_type_id');
        });
    }
}
