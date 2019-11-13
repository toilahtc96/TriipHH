<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnNewIntoCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cars', function (Blueprint $table) {
            //
            $table->string('license_plates', 20);
            $table->string('start_pickup_location',100);
            $table->string('destination_pickup_location',100);
            $table->bigInteger('count_seat');
            $table->string('car_type',100)->nullable();
            $table->string('places_passing',200)->nullable();
            $table->integer('direction');
            $table->dropColumn('time_pickup');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cars', function (Blueprint $table) {
            //
            $table->dropColumn('license_plates');
            $table->dropColumn('start_pickup_location');
            $table->dropColumn('destination_pickup_location');
            $table->dropColumn('count_seat');
            $table->dropColumn('car_type');
            $table->dropColumn('places_passing');
            $table->dropColumn('direction');
        });
    }
}
