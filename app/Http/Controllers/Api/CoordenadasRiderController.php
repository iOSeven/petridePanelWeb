<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CoordenadasRider;

class CoordenadasRiderController extends Controller
{
    public function addCoordenadas($user_id, $latitud, $longitud){
        if(!empty($user_id) && !is_null($user_id)){
            if(!empty($latitud) && !is_null($latitud)){
                if(!empty($longitud) && !is_null($longitud)){
                    $location = CoordenadasRider::create([
                        'user_id' => $user_id,
                        'latitud' => $latitud,
                        'longitud' => $longitud,
                    ]);
            
                    if($location){
                        $flag['status'] = true;
                        $flag['msg'] = "Locacion guardada correctamente.";
                        return \Response::json(['success' => $flag], 200, ['Content-Type' => 'application/json;charset=utf8'], JSON_UNESCAPED_UNICODE);
                    }
                } else {
                    $flag['msg'] = "El parametro <longitud> no puede estar vacio";
                    return \Response::json(['success' => $flag], 400, ['Content-Type' => 'application/json;charset=utf8'], JSON_UNESCAPED_UNICODE);
                }
            } else {
                $flag['msg'] = "El parametro <latitud> no puede estar vacio";
                return \Response::json(['success' => $flag], 400, ['Content-Type' => 'application/json;charset=utf8'], JSON_UNESCAPED_UNICODE);
            }
        } else {
            $flag['msg'] = "El parametro <user> no puede estar vacio";
            return \Response::json(['success' => $flag], 400, ['Content-Type' => 'application/json;charset=utf8'], JSON_UNESCAPED_UNICODE);
        }

        return \Response::json(['success' => $flag], 200, ['Content-Type' => 'application/json;charset=utf8'], JSON_UNESCAPED_UNICODE);

    }
}
