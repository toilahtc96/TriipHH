<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStartDateEndDateToTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('combo_trips', function (Blueprint $table) {
            //
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('combo_trips', function (Blueprint $table) {
            //
            $table->dropColumn('start_date');
            $table->dropColumn('end_date');
        });
    }
}
