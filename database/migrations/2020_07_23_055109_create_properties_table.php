<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
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
        // PROPERTIES (ALL PROPERTIES)
        //
        Schema::create('properties', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ref', false)->nullable(true)->default(null);
            $table->unsignedBigInteger('owner_id', false)->nullable(true)->default(null);
            $table->unsignedBigInteger('legal_validator_id', false)->nullable(true)->default(null);
            $table->unsignedBigInteger('commercial_validator_id', false)->nullable(true)->default(null);
//            $table->morphs('propertyable');
            $table->string('propertyable_type',255)->nullable(true)->default(null);
            $table->unsignedBigInteger('propertyable_id', false)->nullable(true)->default(null);
            $table->date('legal_validated')->nullable(true)->default(null);
            $table->date('commercial_validated')->nullable(true)->default(null);
            $table->string('operation_type',255)->nullable(true)->default(null);
            $table->string('url_image',255)->nullable(true)->default(null);
            $table->unsignedFloat('price',10,2)->default(0.0);
            $table->unsignedFloat('agency_commissions',10,2)->default(0.0);
            $table->unsignedFloat('plf_commissions',10,2)->default(0.0);
            $table->unsignedFloat('margin_performance',10,2)->default(0.0);
            $table->text('description')->nullable(true)->default(null);
            $table->string('distance_airport', 255)->nullable(true)->default(null);
            $table->string('distance_sea', 255)->nullable(true)->default(null);
            $table->string('distance_beach', 255)->nullable(true)->default(null);
            $table->string('distance_city', 255)->nullable(true)->default(null);
            $table->string('distance_golf', 255)->nullable(true)->default(null);
            $table->softDeletes();
            $table->timestamps();
        });

        //
        // PROPERTY IMAGES
        //
        Schema::create('images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('property_id', false)->nullable(false);
            $table->string('url',255)->nullable(true)->default(null);

            $table->softDeletes();
            $table->timestamps();
        });

        //
        // PROPERTY ATTACHED DOCUMENTS
        //
        Schema::create('documents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('property_id', false)->nullable(false);
            $table->string('url',255)->nullable(true)->default(null);

            $table->softDeletes();
            $table->timestamps();
        });

        //
        // COMMERCIAL, LOCALES COMERCIALES
        //
        Schema::create('commercial_properties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('xml_characteristics')->nullable(true)->default(null);          //separado por ;
            $table->softDeletes();
            $table->timestamps();
        });

        //
        // COTTAGES, COUNTRY HOMES
        //
        Schema::create('country_homes', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('state', 255)->nullable(true)->default(null);
            $table->unsignedInteger('built_meters', false)->nullable(true)->default(null);
            $table->unsignedInteger('useful_meters', false)->nullable(true)->default(null);
            $table->unsignedInteger('not_built_meters', false)->nullable(true)->default(null);             //metros de parcela
            $table->unsignedInteger('bathrooms', false)->nullable(true)->default(null);
            $table->unsignedInteger('bedrooms', false)->nullable(true)->default(null);
            $table->boolean('energetic_certification')->nullable(true)->default(null);
            $table->string('orientation', 255)->nullable(true)->default(null);
            $table->unsignedInteger('floors', false)->nullable(true)->default(null);                      // bajo/intermedio/atico
            $table->string('characteristics', 255)->nullable(true)->default(null);          //separado por ;
            $table->text('xml_characteristics')->nullable(true)->default(null);          //separado por ;
            $table->string('building_characteristics', 255)->nullable(true)->default(null); //separado por ;
            $table->string('community_fees', 255)->nullable(true)->default(null);


            $table->softDeletes();
            $table->timestamps();
        });

        //
        // APARTMENTS, FLATS        (field floor)
        // GROUND FLOOR APARTMENTS  (field floor)
        // PENTHOUSES               (field floor)
        // TOP FLOOR APARTMENT      (field floor)
        // STUDIO                   (field floor)
        //
        Schema::create('flats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('floor', 255)->nullable(true)->default(null);///bajo/intermedio/atico
            $table->string('type', 255)->nullable(true)->default(null);
            $table->string('state', 255)->nullable(true)->default(null);
            $table->string('urbanization', 255)->nullable(true)->default(null);
            $table->float('built_meters')->nullable(true)->default(null);
            $table->float('useful_meters')->nullable(true)->default(null);
            $table->integer('bathrooms', false)->nullable(true)->default(null);
            $table->integer('bedrooms', false)->nullable(true)->default(null);
            $table->string('facade', 255)->nullable(true)->default(null);//solo exterior o interior
            $table->boolean('elevator')->nullable(true)->default(null);
            $table->boolean('energetic_certification')->nullable(true)->default(null);
            $table->string('orientation', 255)->nullable(true)->default(null);
            $table->string('characteristics', 255)->nullable(true)->default(null);//separado por ;
            $table->text('xml_characteristics')->nullable(true)->default(null);          //separado por ;
            $table->string('building_characteristics', 255)->nullable(true)->default(null);//separado por ;
            $table->string('community_fees', 255)->nullable(true)->default(null);

            $table->softDeletes();
            $table->timestamps();
        });

        //
        // HOMES                                        (field type)
        // SEMIDETACHED VILLAS (SEMIDETACHED HOMES)     (field type)
        // TOWNHOUSE                                    (field type)
        //
        Schema::create('homes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type', 255)->nullable(true)->default(null);
            $table->string('state', 255)->nullable(true)->default(null);
            $table->unsignedInteger('built_meters')->nullable(true)->default(null);
            $table->unsignedInteger('useful_meters')->nullable(true)->default(null);
            $table->unsignedInteger('not_built_meters')->nullable(true)->default(null);//metros de parcela
            $table->unsignedInteger('bathrooms')->nullable(true)->default(null);
            $table->unsignedInteger('bedrooms')->nullable(true)->default(null);
            $table->boolean('energetic_certification')->nullable(true)->default(null);
            $table->string('orientation', 255)->nullable(true)->default(null);
            $table->unsignedInteger('floors')->nullable(true)->default(null);///bajo/intermedio/atico
            $table->string('characteristics', 255)->nullable(true)->default(null);//separado por ;
            $table->text('xml_characteristics')->nullable(true)->default(null);          //separado por ;
            $table->string('building_characteristics', 255)->nullable(true)->default(null);//separado por ;
            $table->string('community_fees', 255)->nullable(true)->default(null);
            $table->softDeletes();
            $table->timestamps();
        });

        //
        // LANDS
        //
        Schema::create('lands', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type',255)->nullable(true)->default(null);
            $table->unsignedInteger('meters',false)->nullable(true)->default(null);
            $table->unsignedInteger('buildable_meters',false)->nullable(true)->default(null);
            $table->unsignedInteger('minimum_meters',false)->nullable(true)->default(null);//metros minimos que alquila
            $table->string('calification',255)->nullable(true)->default(null);
            $table->unsignedInteger('maximum_buildable_floors',false)->nullable(true)->default(null);
            $table->boolean('acceso_rodado')->nullable(true)->default(null);
            $table->string('distance_to_city',255)->nullable(true)->default(null);
            $table->string('land_characteristics',255)->nullable(true)->default(null);//separado por ;
            $table->text('xml_characteristics')->nullable(true)->default(null);          //separado por ;

            $table->softDeletes();
            $table->timestamps();
        });

        //
        // OFFICES
        //
        Schema::create('offices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('state',255)->nullable(true)->default(null);//buen estado/reformar
            $table->unsignedInteger('built_meters',false)->nullable(true)->default(null);
            $table->unsignedInteger('useful_meters',false)->nullable(true)->default(null);
            $table->unsignedInteger('minimum_meters',false)->nullable(true)->default(null);
            $table->string('facade',255)->nullable(true)->default(null);//solo exterior o interior
            $table->string('distribution', 255)->nullable(true)->default(null);//diafana/dividida mamparas/dividida tabiques/plantas de laoficina
            $table->unsignedInteger('floors', false)->nullable(true)->default(null);//nº de plantas
            $table->boolean('office_exclusive_use')->nullable(true)->default(null);//si/no
            $table->unsignedInteger('bathrooms', false)->nullable(true)->default(null);
            $table->boolean('elevator')->nullable(true)->default(null);
            $table->boolean('energetic_certification')->nullable(true)->default(null);
            $table->unsignedInteger('garage', false)->nullable(true)->default(null);
            $table->string('airconditioning', 255)->nullable(true)->default(null);//no/frio/frio y calor/preinstalacion
            $table->string('security', 255)->nullable(true)->default(null);//separado por ;
            $table->string('office_characteristics', 255)->nullable(true)->default(null);//separado por ;
            $table->text('xml_characteristics')->nullable(true)->default(null);          //separado por ;
            $table->string('building_characteristics', 255)->nullable(true)->default(null);//separado por ;
            $table->string('community_fees', 255)->nullable(true)->default(null);
            $table->softDeletes();
            $table->timestamps();
        });

        //
        // PARKING SPACES
        //
        Schema::create('parking_spaces', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('xml_characteristics')->nullable(true)->default(null);          //separado por ;
            //$table->unsignedInteger('built_meters', false)->nullable(true)->default(null);
            $table->softDeletes();
            $table->timestamps();
        });

        //
        // STORAGE ROOMS, TRASTEROS
        //
        Schema::create('storage_rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('xml_characteristics')->nullable(true)->default(null);          //separado por ;
            $table->softDeletes();
            $table->timestamps();
        });


        //
        // FOREIGN KEYS
        //
        Schema::table('properties', function(Blueprint $table) {
            $table->foreign('owner_id')->references('id')->on('owners');
            $table->foreign('legal_validator_id')->references('id')->on('admins');
            $table->foreign('commercial_validator_id')->references('id')->on('admins');
        });

        Schema::table('images', function(Blueprint $table) {
            $table->foreign('property_id')->references('id')->on('properties');
        });

        Schema::table('documents', function(Blueprint $table) {
            $table->foreign('property_id')->references('id')->on('properties');
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

        Schema::dropIfExists('properties');
        Schema::dropIfExists('images');
        Schema::dropIfExists('documents');
        Schema::dropIfExists('commercial_properties');
        Schema::dropIfExists('country_homes');
        Schema::dropIfExists('flats');
        Schema::dropIfExists('homes');
        Schema::dropIfExists('lands');
        Schema::dropIfExists('offices');
        Schema::dropIfExists('parking_spaces');
        Schema::dropIfExists('storage_rooms');

        Schema::enableForeignKeyConstraints();
    }
}
