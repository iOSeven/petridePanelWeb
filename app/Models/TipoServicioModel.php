<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoServicioModel extends Model
{
    use HasFactory;

    protected $table = "tipo_servicio";

    protected $fillable = [
        'name', 'description'
    ];
}
