<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('hotel_name',100);
            $table->string('service_included',1000);
            $table->bigInteger('level');
            $table->string('info',500);
            $table->string('main_image',1000);
            $table->string('list_image',2000);
            $table->string('main_info',1000);
            $table->string('full_info',2000);
            $table->string('place_around',1000);
            $table->string('general_rule',1000);
            $table->bigInteger('rate');
            $table->bigInteger('status');
            $table->unsignedBigInteger('address_id');
            // $table->foreign('address_id')->references('id')->on('localtions');
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
        Schema::dropIfExists('hotels');
    }
}
