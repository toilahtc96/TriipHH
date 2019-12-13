<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookCustomTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_custom_trips', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fullName',1000);
            $table->string('msisdn',50);
            $table->date('start_date');
            $table->time('arrival_time')->nullable();
            $table->bigInteger('pickup_place_id')->nullable();
            $table->date('checkin_date')->nullable();
            $table->bigInteger('status');
            $table->bigInteger('room_id')->unsigned();
            $table->bigInteger('car_id')->unsigned();
            $table->bigInteger('combo_type_id')->unsigned();
            $table->foreign('room_id')->references('id')->on('room_hotels');
            $table->foreign('car_id')->references('id')->on('cars');
            $table->foreign('combo_type_id')->references('id')->on('combo_types');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_custom_trips');
    }
}
