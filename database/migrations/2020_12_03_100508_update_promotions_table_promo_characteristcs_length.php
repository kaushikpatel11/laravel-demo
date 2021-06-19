<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePromotionsTablePromoCharacteristcsLength extends Migration
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
            $table->text('promotion_characteristics')->nullable(true)->default(null)->after('promotion_description')->change();
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
            $table->dropColumn('promotion_characteristics');
        });
    }
}
