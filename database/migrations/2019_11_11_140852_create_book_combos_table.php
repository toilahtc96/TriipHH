<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookCombosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_combos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fullname',1000);
            $table->string('msisdn',50);
            $table->date('start_date');
            $table->bigInteger('pickup_place_id');
            $table->bigInteger('status');
            $table->bigInteger('combo_id')->unsigned();
            $table->bigInteger('combo_type_id')->unsigned();
            $table->foreign('combo_id')->references('id')->on('combo_trips');
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
        Schema::dropIfExists('book_combos');
    }
}
