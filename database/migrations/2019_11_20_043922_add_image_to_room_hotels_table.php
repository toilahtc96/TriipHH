<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImageToRoomHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('room_hotels', function (Blueprint $table) {
            //
            $table->string('main_image',1000)->nullable();
            $table->string('list_image',2000)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('room_hotels', function (Blueprint $table) {
            //
            $table->dropColumn('main_image');
            $table->dropColumn('list_image');
        });
    }
}
