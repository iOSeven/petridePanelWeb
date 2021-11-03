<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocioRidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socio_riders', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->date('FechaNacimiento')->nullable();
            $table->string('Sexo')->nullable();
            $table->string('Domicilio')->nullable();
            $table->string('Colonia')->nullable();
            $table->string('CodigoPostal')->nullable();
            $table->string('Estado')->nullable();
            $table->string('Celular')->nullable();
            $table->string('EstadoCivil')->nullable();
            $table->string('NivelEstudios')->nullable();
            $table->string('SituacionLaboral')->nullable();
            $table->string('FotoIdentificacion')->nullable();
            $table->string('FotoSeguroCobertura')->nullable();
            $table->string('FotoConstanciaFiscal')->nullable();
            $table->string('FotoPerfil')->nullable();
            $table->string('NoCuenta')->nullable();
            $table->string('CLABE')->nullable();
            $table->string('CER')->nullable();
            $table->string('KEY')->nullable();
            $table->string('Password')->nullable();
            $table->string('TipoAutomovil')->nullable();
            $table->string('Placas')->nullable();
            $table->string('ColorAutomovil')->nullable();
            $table->string('PolizaSeguro')->nullable();
            $table->string('VigenciaSeguro')->nullable();
            $table->string('LicenciaConducir')->nullable();
            $table->string('VigenciaLicencia')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('socio_riders');
    }
}
