<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameCombotypeNameColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('combo_types', function (Blueprint $table) {
            //
        $table->renameColumn('combotype_name', 'combo_type_name');
   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('combo_types', function (Blueprint $table) {
            //
            $table->renameColumn('combo_type_name', 'combotype_name');
        });
    }
}