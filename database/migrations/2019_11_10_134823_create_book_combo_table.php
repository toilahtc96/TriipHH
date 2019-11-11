<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookComboTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_combo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            
            $table->string('fullname');
            $table->string('msisdn');
            $table->date('start_date');
            $table->bigInteger('pickup_place_id');
            $table->bigInteger('status');
            $table->bigInteger('combo_id')->unsigned();
            $table->bigInteger('combo_type_id')->unsigned();
            $table->foreign('combo_id')->references('id')->on('combo_trip');
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
        Schema::dropIfExists('book_combo');
    }
}