<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookCustomTripTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_custom_trip', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('fullName');
            $table->string('msisdn');
            $table->date('start_date');
            $table->time('arrival_time');
            $table->bigInteger('pickup_place_id');
            $table->date('checkin_date');
            $table->bigInteger('status');
            $table->bigInteger('room_id')->unsigned();
            $table->bigInteger('car_id')->unsigned();
            $table->bigInteger('combo_type_id')->unsigned();
            $table->foreign('room_id')->references('id')->on('room_hotel');
            $table->foreign('car_id')->references('id')->on('car');
            $table->foreign('combo_type_id')->references('id')->on('combo_type');
            // $table->foreign('pickup_place_id')->references('id')->on('localtion');
            
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_custom_trip');
    }
}