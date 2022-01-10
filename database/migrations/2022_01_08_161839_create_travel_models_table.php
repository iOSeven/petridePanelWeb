<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravelModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travels', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('rider_id');
            $table->string('latitud_start');
            $table->string('longitud_start');
            $table->string('latitud_end');
            $table->string('longitud_end');
            $table->string('inicio');
            $table->string('fin');
            $table->string('distancia');
            $table->string('precio_km');
            $table->string('hora');
            $table->double('costo');
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
        Schema::dropIfExists('travels');
    }
}
