<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('own_car');
            $table->string('msisdn');
            $table->decimal('price');
            $table->time('time_pickup');
            $table->bigInteger('starting_location_id')->unsigned();
            $table->bigInteger('destination_id')->unsigned();
            $table->bigInteger('status');
            // $table->foreign('starting_location_id')->references('id')->on('localtion');
            // $table->foreign('destination_id')->references('id')->on('localtion');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car');
    }
}
