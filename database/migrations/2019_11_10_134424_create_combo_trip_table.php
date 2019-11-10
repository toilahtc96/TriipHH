<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComboTripTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('combo_trip', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->time('start_time');
            $table->time('arrival_time');
            $table->decimal('price');
            $table->string('service_included');
            $table->bigInteger('status');
            $table->bigInteger('hotel_id')->unsigned();
            $table->bigInteger('room_id')->unsigned();
            $table->bigInteger('car_id')->unsigned();
            $table->bigInteger('combo_type_id')->unsigned();
            $table->foreign('hotel_id')->references('id')->on('hotel');
            $table->foreign('room_id')->references('id')->on('room_hotel');
            $table->foreign('car_id')->references('id')->on('car');
            $table->foreign('combo_type_id')->references('id')->on('combo_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('combo_trip');
    }
}
