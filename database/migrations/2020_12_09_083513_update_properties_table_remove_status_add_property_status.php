<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePropertiesTableRemoveStatusAddPropertyStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('properties', function ($table) {
            //$table->string('status', 255)->nullable(true)->default('Obra nueva')->after('owner_id');
            $table->renameColumn('status', 'property_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
      /*  Schema::table('properties', function ($table) {
            $table->dropColumn('status');
        });*/
    }
}
