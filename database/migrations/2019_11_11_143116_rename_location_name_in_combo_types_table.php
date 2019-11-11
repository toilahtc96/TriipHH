<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameLocationNameInComboTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('combo_types', function (Blueprint $table) {
            $table->renameColumn('location_name', 'combo_type_name');
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
            $table->renameColumn('combo_type_name', 'location_name');
        });
    }
}
