<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealEstateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('real_estates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id',false)->nullable(true)->default(null);
            $table->string('business_name',255)->nullable(true)->default(null);
            $table->string('commercial_name',255)->nullable(true)->default(null);
            $table->string('vat_number',25)->nullable(true)->default(null);
            $table->string('name',255)->nullable(true)->default(null);
            $table->string('surname',255)->nullable(true)->default(null);
            $table->string('phone_1',50)->nullable(true)->default(null);
            $table->string('phone_2',50)->nullable(true)->default(null);
            $table->unsignedInteger('punctuation',false)->nullable(true)->default(null);
            $table->enum('status',[0,1,2])->nullable(true)->default(null)->comment('cuando una inmobiliaria se registra por peimera vez esta inactiva (status=0). luego una validador le puede dejar un periodo de prueba sin abrir ficha (status=1) y cuando ya empieza a pagar pasa a validada (status=2). Se puede volver a desactivar pasando status=0');
            $table->string('origin', 255)->nullable(true)->default(null);
            $table->softDeletes();
            $table->timestamps();
        });

        //
        // FOREIGN KEYS
        //
        Schema::table('real_estates', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');;
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

        Schema::dropIfExists('real_estates');

        Schema::enableForeignKeyConstraints();
    }
}
