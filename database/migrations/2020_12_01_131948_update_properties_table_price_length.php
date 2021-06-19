<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePropertiesTablePriceLength extends Migration
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
            $table->unsignedFloat('price',20,2)->default(0.0)->change();
            $table->unsignedFloat('agency_commissions',20,2)->default(0.0)->change();
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
        Schema::table('properties', function ($table) {
            $table->dropColumn('price');
            $table->dropColumn('agency_commissions');
        });
    }
}
