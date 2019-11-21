<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddServiceTypeFbLinkToBookRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('book_rooms', function (Blueprint $table) {
            //
            $table->bigInteger('type_service')->nullable();
            $table->string('fb_link', 500)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('book_rooms', function (Blueprint $table) {
            //

            $table->dropColumn('type_service');
            $table->dropColumn('fb_link');
        });
    }
}
