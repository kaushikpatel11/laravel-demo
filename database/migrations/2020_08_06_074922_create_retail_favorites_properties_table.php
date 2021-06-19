<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetailFavoritesPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retail_favorites_properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedbigInteger('real_estate_id');
            $table->foreign('real_estate_id')->references('id')->on('real_estates')->onDelete('cascade');
            $table->unsignedbigInteger('property_id');
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
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
        Schema::dropIfExists('retail_favorites_properties');
    }
}
