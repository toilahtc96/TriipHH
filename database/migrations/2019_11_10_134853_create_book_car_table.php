<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookCarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_car', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('fullname');
            $table->string('msisdn');
            $table->date('start_date');
            $table->time('arrival_time');
            $table->bigInteger('pickup_place_id');
            $table->bigInteger('status');
            $table->bigInteger('car_id')->unsigned();
            $table->foreign('car_id')->references('id')->on('car');
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
        Schema::dropIfExists('book_car');
    }
}
