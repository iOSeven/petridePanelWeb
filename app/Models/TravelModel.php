<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TravelModel extends Model
{
    use HasFactory;

    protected $table = "travels";

    protected $fillable = [
        'user_id',
        'rider_id',
        'latitud_start',
        'longitud_start',
        'latitud_end',
        'longitud_end',           
        'inicio',           
        'fin',
        'distancia',
        'precio_km',
        'hora',
        'costo',           
    ];
}
