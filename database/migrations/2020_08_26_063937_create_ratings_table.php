<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('ratings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('card_id', false)->nullable(true)->default(null);
            $table->unsignedbigInteger('appointment_id', false)->nullable(true)->default(null)->unique();
            $table->string('comment_key', 255)->nullable(true)->default(null);
            $table->unsignedBigInteger('rating', false)->nullable(true)->default(null);
            $table->string('open_comment', 255)->nullable(true)->default(null);

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('ratings', function (Blueprint $table) {
            $table->foreign('card_id')->references('id')->on('cards')->onDelete('cascade');
            //añadida nueva relacion con citas, para cumplir la restriccion de comentar una inmobiliaria 
            //despues de haber realizado una cita
            $table->foreign('appointment_id')->references('id')->on('appointments')->onDelete('cascade');
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

        Schema::dropIfExists('ratings');

        Schema::enableForeignKeyConstraints();
    }
}
