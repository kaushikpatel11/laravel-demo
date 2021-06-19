<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZoneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        //
        // COUNTRIES
        //
        Schema::create('countries', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('iso', 3)->nullable(true)->default(null);;
            $table->string('name', 255)->nullable(true)->default(null);;

            $table->softDeletes();
            $table->timestamps();
        });

        //
        // STATES
        //
        Schema::create('states', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('country_id', false)->nullable(true)->default(null);
            $table->string('name', 255)->nullable(true)->default(null);;

            $table->softDeletes();
            $table->timestamps();
        });

        //
        // COUNTIES
        //
        Schema::create('counties', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('country_id', false)->nullable(true)->default(null);
            $table->unsignedBigInteger('state_id', false)->nullable(true)->default(null);
            $table->string('name', 255)->nullable(true)->default(null);;

            $table->softDeletes();
            $table->timestamps();
        });

        //
        // CITIES
        //
        Schema::create('cities', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('country_id', false)->nullable(true)->default(null);
            $table->unsignedBigInteger('state_id', false)->nullable(true)->default(null);
            $table->unsignedBigInteger('county_id', false)->nullable(true)->default(null);
            $table->string('name', 255)->nullable(true)->default(null);;

            $table->softDeletes();
            $table->timestamps();
        });

        //
        // STREETS
        //
        Schema::create('streets', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('country_id', false)->nullable(true)->default(null);
            $table->unsignedBigInteger('state_id', false)->nullable(true)->default(null);
            $table->unsignedBigInteger('county_id', false)->nullable(true)->default(null);
            $table->unsignedBigInteger('city_id', false)->nullable(true)->default(null);
            $table->string('postcode', 25)->nullable(true)->default(null);
            $table->string('name', 255)->nullable(true)->default(null);;

            $table->softDeletes();
            $table->timestamps();
        });

        //
        // LOCATIONS
        //
        Schema::create('locations', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('country_id', false)->nullable(true)->default(null)->comment('Pais');
            $table->unsignedBigInteger('state_id', false)->nullable(true)->default(null)->comment('Comunidad Autonoma, Estado (usa), Lander (germany), Canton (swiss)');
            $table->unsignedBigInteger('county_id', false)->nullable(true)->default(null)->comment('Provincia (spain), Prefectura (france), Condado (uk)');
            $table->unsignedBigInteger('city_id', false)->nullable(true)->default(null)->comment('Ciudad');
//            $table->morphs('locationable')->nullable(true)->default(null)->comment('Cada localizacion apunta o al modelo Property o RealEstate.');
            $table->morphs('locationable');  // Cada localizacion apunta o al modelo Property o RealEstate.
            $table->string('street', 255)->nullable(true)->default(null);
            $table->string('postcode', 25)->nullable(true)->default(null);
            $table->decimal('latitude', 20, 17, false)->nullable(true)->default(null);
            $table->decimal('longitude', 20, 17, false)->nullable(true)->default(null);

            $table->softDeletes();
            $table->timestamps();
        });

        //
        // ZONES
        //
        Schema::create('zones', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('realestate_id', false)->nullable(true)->default(null)->comment('Deberia ser de tipo inmobiliaria');
            $table->morphs('zoneable'); // Area/zona que una inmobiliaria puede trabajar, España, Extremadura/Galicia, Almeria/Alava, Elche/Pamplona

            $table->softDeletes();
            $table->timestamps();
        });


        //
        // FOREIGN KEYS
        //
        Schema::table('states', function(Blueprint $table) {
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');;
        });

        Schema::table('counties', function(Blueprint $table) {
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');;
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');;
        });

        Schema::table('cities', function(Blueprint $table) {
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');;
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');;
            $table->foreign('county_id')->references('id')->on('counties')->onDelete('cascade');;
        });

        Schema::table('streets', function(Blueprint $table) {
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');;
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');;
            $table->foreign('county_id')->references('id')->on('counties')->onDelete('cascade');;
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');;
        });

        Schema::table('locations', function(Blueprint $table) {
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');;
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');;
            $table->foreign('county_id')->references('id')->on('counties')->onDelete('cascade');;
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');;
        });

        Schema::table('zones', function(Blueprint $table) {
            $table->foreign('realestate_id')->references('id')->on('real_estates')->onDelete('cascade');;
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();

        Schema::dropIfExists('streets');
        Schema::dropIfExists('cities');
        Schema::dropIfExists('counties');
        Schema::dropIfExists('states');
        Schema::dropIfExists('countries');
        Schema::dropIfExists('locations');
        Schema::dropIfExists('zones');

        Schema::enableForeignKeyConstraints();
    }
}
