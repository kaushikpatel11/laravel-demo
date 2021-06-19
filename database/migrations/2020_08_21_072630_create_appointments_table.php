<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('appointments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('card_id', false)->nullable(true)->default(null);
            $table->string('status', 255)->nullable(true)->default(null);
            $table->string('client_name', 255)->nullable(true)->default(null);
            $table->string('client_nif', 25)->nullable(true)->default(null);
            $table->datetime('date')->nullable(true)->default(null);
            $table->boolean('accomplished')->nullable(true)->default(null);

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('appointments', function (Blueprint $table) {
            $table->foreign('card_id')->references('id')->on('cards')->onDelete('cascade');
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

        Schema::dropIfExists('appointments');

        Schema::enableForeignKeyConstraints();
    }
}
