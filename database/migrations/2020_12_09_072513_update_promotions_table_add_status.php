<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePromotionsTableAddStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('promotions', function ($table) {
            $table->date('promotion_delivery_date')->nullable(true)->after('promotion_rappel')->change();
            $table->string('status', 255)->nullable(true)->default('Obra nueva')->after('promotion_delivery_date');
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
        Schema::table('promotions', function ($table) {
            $table->dropColumn('status');
        });
    }
}
