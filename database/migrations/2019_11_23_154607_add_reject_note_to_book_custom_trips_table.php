<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRejectNoteToBookCustomTripsTable extends Migration
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
            $table->string('reject_note', 1000)->nullable();
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
            $table->dropColumn('reject_note');

        });
    }
}
