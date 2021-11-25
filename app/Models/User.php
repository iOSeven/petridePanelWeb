<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;

use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Role;
use App\Models\TipoServicioModel;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;
    use Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'lastname1', 'lastname2', 'email', 'password', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role() {
    	return $this->belongsTo(TipoServicioModel::class, 'role_id', 'id');
    }

    /**Metodo poara imagen en el menu derecho */
    public function adminlte_image() {
        return 'https://pet-rideadmin.com/img/icono.jpg';
    }
}
