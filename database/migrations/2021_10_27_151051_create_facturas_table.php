<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();
            $table->integer('pago_id')->nullable();
            $table->string('razonSocial')->nullable();
            $table->string('rfc')->nullable();
            $table->string('codigo_fiscal')->nullable();
            $table->string('folio_factura')->nullable();
            $table->string('folio_fiscal')->nullable();
            $table->string('metodo_pago')->nullable();
            $table->date('fecha_emision')->nullable();
            $table->double('importe')->nullable();
            $table->double('iva')->nullable();
            $table->double('total')->nullable();
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
        Schema::dropIfExists('facturas');
    }
}
