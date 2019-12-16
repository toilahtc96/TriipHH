<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangePickupPlaceToBookCustomTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('book_custom_trips', function (Blueprint $table) {
            //
            $table->string('pickup_place_id', 100)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('book_custom_trips', function (Blueprint $table) {
            //
            $table->dropColumn('pickup_place_id');
        });
    }
}
