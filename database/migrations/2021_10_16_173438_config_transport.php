<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ConfigTransport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::create('config_transporte', function (Blueprint $table) {
    		$table->increments('id');
            $table->integer('tipoSocio');
            $table->double('ComisionPetRide');
            $table->double('CostoRuta');
            $table->double('GananciaRuta');
            $table->double('CostoKM');
            $table->double('CostoCancelacion');
            $table->double('TarifaMinRider');
            $table->double('CostoCancelRide');
            $table->double('TarifaMinCancel');
            $table->double('PrecioKPico');
            $table->double('PrecioKNPico');    		
    		$table->text('description');
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
        Schema::dropIfExists('config_transporte');
    }
}
