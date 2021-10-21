<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SolicitudesController extends Controller
{
    public function index(){

        $solicitudes = User::select('id','name', 'lastname1', 'lastname2', 'role_id', 'estatus')
                        ->where('estatus', 'pendiente')
                        ->where('role_id', '>', 1)
                        ->orderBy('id', 'DESC')->get();
        foreach($solicitudes as $solicitud){
            switch($solicitud->role_id) {
                case 2:
                    $solicitud->tipo_servicio = 'Chofer';
                break;

                case 3: 
                    $solicitud->tipo_servicio = 'Cliente';
                break;
            }
            
        }

        return view('solicitudes.index', compact(['solicitudes']));
    }

    public function delete(Request $request){
        
    }
}
