<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_cars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fullname',1000);
            $table->string('msisdn',50);
            $table->date('start_date');
            $table->time('arrival_time');
            $table->bigInteger('pickup_place_id');
            $table->bigInteger('status');
            $table->bigInteger('car_id')->unsigned();
            $table->foreign('car_id')->references('id')->on('cars');
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
        Schema::dropIfExists('book_cars');
    }
}
