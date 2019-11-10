<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookRoomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_room', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('fullname');
            $table->string('msisdn');
            $table->date('start_date');
            $table->bigInteger('status');
            $table->bigInteger('room_id')->unsigned();
            $table->bigInteger('combo_type_id')->unsigned();
            $table->foreign('room_id')->references('id')->on('room_hotel');
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
        Schema::dropIfExists('book_room');
    }
}
