<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBookStatusIdToBookCustomTripsTable extends Migration
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
            $table->bigInteger('book_status_id');
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
            $table->dropColumn('book_status_id');
        });
    }
}
