<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('hotel_name');
            $table->string('service_included');
            $table->bigInteger('level');
            
            $table->string('info');
            $table->string('main_image');
            $table->string('list_image');
            $table->string('main_info');
            $table->string('full_info');
            $table->string('place_around');
            $table->string('general_rule');
            $table->bigInteger('rate');
            $table->bigInteger('status');
            $table->bigInteger('address_id')->unsigned();
            // $table->foreign('address_id')->references('id')->on('localtion');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotel');
    }
}
