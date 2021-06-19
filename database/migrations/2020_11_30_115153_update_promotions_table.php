<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePromotionsTable extends Migration
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
            $table->string('promotion_dropbox', 255)->nullable(true)->default(null)->after('promotion_description');
            $table->string('promotion_web', 255)->nullable(true)->default(null)->after('promotion_dropbox');
            $table->string('promotion_other', 255)->nullable(true)->default(null)->after('promotion_web');
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
            $table->dropColumn('promotion_other');
            $table->dropColumn('promotion_web');
            $table->dropColumn('promotion_dropbox');
        });
    }
}
