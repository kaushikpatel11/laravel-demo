<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('promotion_name', 255)->nullable(true)->default(null);
            $table->string('promotion_property_types', 255)->nullable(true)->default(null);
            $table->unsignedFloat('promotion_price_min', 12,2)->nullable(true)->default(null);
            $table->unsignedFloat('promotion_price_max', 12,2)->nullable(true)->default(null);
            $table->unsignedFloat('promotion_meters_min', 12,2)->nullable(true)->default(null);
            $table->unsignedFloat('promotion_meters_max', 12,2)->nullable(true)->default(null);
            $table->unsignedInteger('promotion_bathrooms_min', false)->nullable(true)->default(null);
            $table->unsignedInteger('promotion_bathrooms_max', false)->nullable(true)->default(null);
            $table->unsignedInteger('promotion_bedrooms_min', false)->nullable(true)->default(null);
            $table->unsignedInteger('promotion_bedrooms_max', false)->nullable(true)->default(null);
            $table->string('promotion_agency_commissions', 255)->nullable(true)->default(null);
            $table->boolean('promotion_rappel')->nullable(true)->default(null);
            $table->datetime('promotion_delivery_date')->nullable(true)->default(null);
            $table->string('promotion_description', 255)->nullable(true)->default(null);
            $table->string('promotion_characteristics', 255)->nullable(true)->default(null);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();

        Schema::dropIfExists('promotions');

        Schema::enableForeignKeyConstraints();
    }
}