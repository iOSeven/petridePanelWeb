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
    
    public function newTravel($user_id, $latitud_start, $longitud_start,$latitud_end, $longitud_end, $distance, $hora){
        //Variables 
        $hora_pico = 4;
        $tarifaMinima = 5;
        $precio_viaje = 0;
        $km = 3;
        $km_pico = 6;
        if(!empty($user_id) && !is_null($user_id)){
            if(!empty($latitud_start) && !is_null($latitud_start)){
                if(!empty($longitud_start) && !is_null($longitud_start)){
                    if(!empty($latitud_end) && !is_null($latitud_end)){
                        if(!empty($longitud_end) && !is_null($longitud_end)){
                            if(!empty($distance) && !is_null($distance)){
                                if(!empty($hora) && !is_null($hora)){
                                    $precio_km = 0;
                                    if($hora == $hora_pico){
                                        $precio_km = $km_pico;
                                    } else {
                                        $precio_km = $km;
                                    }

                                    $precio_viaje = $distance * $precio_km;

                                    $flag['distancia'] = $distance;
                                    $flag['precio_km'] = $precio_km;
                                    $flag['hora'] = $hora;
                                    $flag['precio_viaje'] = $precio_viaje;
                                    $flag['msg'] = "El costo de su viaje sera de $".$precio_viaje;
                                } else {
                                    $flag['msg'] = "El parametro <Hora> no puede estar vacio";
                                    return \Response::json(['success' => $flag], 400, ['Content-Type' => 'application/json;charset=utf8'], JSON_UNESCAPED_UNICODE);
                                }
                            } else {
                                $flag['msg'] = "El parametro <distancia> no puede estar vacio";
                                return \Response::json(['success' => $flag], 400, ['Content-Type' => 'application/json;charset=utf8'], JSON_UNESCAPED_UNICODE);
                            }
                        } else {
                            $flag['msg'] = "El parametro <longitud final> no puede estar vacio";
                            return \Response::json(['success' => $flag], 400, ['Content-Type' => 'application/json;charset=utf8'], JSON_UNESCAPED_UNICODE);
                        }
                    } else {
                        $flag['msg'] = "El parametro <latitud final> no puede estar vacio";
                        return \Response::json(['success' => $flag], 400, ['Content-Type' => 'application/json;charset=utf8'], JSON_UNESCAPED_UNICODE);
                    }
                } else {
                    $flag['msg'] = "El parametro <longitud inicial> no puede estar vacio";
                    return \Response::json(['success' => $flag], 400, ['Content-Type' => 'application/json;charset=utf8'], JSON_UNESCAPED_UNICODE);
                }
            } else {
                $flag['msg'] = "El parametro <latitud inicial> no puede estar vacio";
                return \Response::json(['success' => $flag], 400, ['Content-Type' => 'application/json;charset=utf8'], JSON_UNESCAPED_UNICODE);
            }            
        } else {
            $flag['msg'] = "El parametro <user> no puede estar vacio";
            return \Response::json(['success' => $flag], 400, ['Content-Type' => 'application/json;charset=utf8'], JSON_UNESCAPED_UNICODE);
        }     

        return \Response::json(['success' => $flag], 200, ['Content-Type' => 'application/json;charset=utf8'], JSON_UNESCAPED_UNICODE);
    }
}
