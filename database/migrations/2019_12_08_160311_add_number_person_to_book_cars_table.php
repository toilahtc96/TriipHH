<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNumberPersonToBookCarsTable extends Migration
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
            $table->integer('adults')->nullable();
            $table->integer('minors')->nullable();
            $table->integer('childrens')->nullable();
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
            $table->dropColumn('adults');
            $table->dropColumn('minors');
            $table->dropColumn('childrens');
        });
    }
}
