<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateOwnersTableAddPhoneScheduleRemarks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('owners', function ($table) {
            $table->string('phones', 255)->nullable(true)->default(null)->after('type');
            $table->string('open', 255)->nullable(true)->default(null)->after('type');
            $table->string('close', 255)->nullable(true)->default(null)->after('type');
            $table->string('remarks', 255)->nullable(true)->default(null)->after('type');
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
        Schema::table('owners', function ($table) {
            $table->dropColumn('phones');
            $table->dropColumn('open');
            $table->dropColumn('close');
            $table->dropColumn('remarks');
        });
    }
}
