<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class socioRider extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'FechaNacimiento',
        'Sexo',
        'Domicilio',
        'Colonia',
        'CodigoPostal',
        'Estado',
        'Celular',
        'EstadoCivil',
        'NivelEstudios',
        'SituacionLaboral',
        'FotoIdentificacion',
        'FotoSeguroCobertura',
        'FotoConstanciaFiscal',
        'FotoPerfil',
        'NoCuenta',
        'CLABE',
        'CER',
        'KEY',
        'Password',
        'TipoAutomovil',
        'Placas',
        'ColorAutomovil',
        'PolizaSeguro',
        'VigenciaSeguro',
        'LicenciaConducir',
        'VigenciaLicencia',            
    ];
}
