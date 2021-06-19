<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoricalLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //1 sin validar, 2 activa, 3 cancelada, 4desactivada,
        //5 en proceso inmozon, 6 en proceso propietario
        //7 vendida
        Schema::create('historical_lines', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('status_id')->unsigned()->nullable(true);
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->unsignedBigInteger('property_id');
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
            $table->unsignedBigInteger('admin_id')->nullable(true);
            $table->foreign('admin_id')->references('id')->on('admins');
            $table->text('reason')->nullable(true);
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
        Schema::dropIfExists('historical_lines');
    }
}
