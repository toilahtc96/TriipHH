<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeType2ColumnToBookCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('book_cars', function (Blueprint $table) {
            //
            $table->string('pickup_place_id', 100)->nullable()->change();
            $table->integer('car_id')->nullable()->change();
            $table->time('arrival_time')->nullable()->change();
            $table->time('start_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('book_cars', function (Blueprint $table) {
            //
            $table->dropColumn('car_id');
            $table->dropColumn('pickup_place_id');
            $table->dropColumn('arrival_time');
            $table->dropColumn('start_time');
        });
    }
}
