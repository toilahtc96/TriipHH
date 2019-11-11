<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_hotels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('level');
            $table->decimal('price');
            $table->bigInteger('status');
            $table->string('service_included',1000);
            $table->bigInteger('hotel_id')->unsigned();
            $table->foreign('hotel_id')->references('id')->on('hotels');
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
        Schema::dropIfExists('room_hotels');
    }
}
