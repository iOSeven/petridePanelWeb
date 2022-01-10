<?php

namespace App\Http\Controllers\Api;

use App\Models\TravelModel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TravelModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TravelModel  $travelModel
     * @return \Illuminate\Http\Response
     */
    public function show(TravelModel $travelModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TravelModel  $travelModel
     * @return \Illuminate\Http\Response
     */
    public function edit(TravelModel $travelModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TravelModel  $travelModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TravelModel $travelModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TravelModel  $travelModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(TravelModel $travelModel)
    {
        //
    }

    public function newTravel($user_id, $rider_id, $latitud_start, $longitud_start,$latitud_end, $longitud_end, $distance, $hora, $inicio, $fin){
        //Variables 
        $hora_pico = 4;
        $tarifaMinima = 5;
        $precio_viaje = 0;
        $km = 3;
        $km_pico = 6;
        if(!empty($user_id) && !is_null($user_id)){
            if(!empty($rider_id) && !is_null($rider_id)){
                if(!empty($latitud_start) && !is_null($latitud_start)){
                    if(!empty($longitud_start) && !is_null($longitud_start)){
                        if(!empty($latitud_end) && !is_null($latitud_end)){
                            if(!empty($longitud_end) && !is_null($longitud_end)){
                                if(!empty($distance) && !is_null($distance)){
                                    if(!empty($hora) && !is_null($hora)){
                                        if(!empty($inicio) && !is_null($inicio)){
                                            if(!empty($fin) && !is_null($fin)){
                                                $precio_km = 0;
                                                if($hora == $hora_pico){
                                                    $precio_km = $km_pico;
                                                } else {
                                                    $precio_km = $km;
                                                }
    
                                                $precio_viaje = $distance * $precio_km;
    
                                                $travel = TravelModel::create([
                                                    'user_id' => $user_id,
                                                    'rider_id' => $rider_id,
                                                    'latitud_start' => $latitud_start,
                                                    'longitud_start' => $longitud_start,
                                                    'latitud_end' => $latitud_end,
                                                    'longitud_end'=> $longitud_end,
                                                    'inicio' => $inicio,
                                                    'fin' => $fin,
                                                    'distancia' => $distance,
                                                    'precio_km' => $precio_km,
                                                    'hora' => $hora,
                                                    'costo' => $precio_viaje,
                                                ]);

                                                if($travel){
                                                    $flag['distancia'] = $distance;
                                                    $flag['precio_km'] = $precio_km;
                                                    $flag['hora'] = $hora;
                                                    $flag['precio_viaje'] = $precio_viaje;
                                                    $flag['msg'] = "El costo de su viaje sera de $".$precio_viaje;
                                                } else {
                                                    $flag['msg'] = "Ocurrio un error al solicitar su viaje";
                                                    return \Response::json(['success' => $flag], 400, ['Content-Type' => 'application/json;charset=utf8'], JSON_UNESCAPED_UNICODE);
                                                }
                                            } else {
                                                $flag['msg'] = "El parametro <Inicio> no puede estar vacio";
                                                return \Response::json(['success' => $flag], 400, ['Content-Type' => 'application/json;charset=utf8'], JSON_UNESCAPED_UNICODE);
                                            }
                                        } else {
                                            $flag['msg'] = "El parametro <Inicio> no puede estar vacio";
                                            return \Response::json(['success' => $flag], 400, ['Content-Type' => 'application/json;charset=utf8'], JSON_UNESCAPED_UNICODE);
                                        }
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
                $flag['msg'] = "El parametro <rider> no puede estar vacio";
                return \Response::json(['success' => $flag], 400, ['Content-Type' => 'application/json;charset=utf8'], JSON_UNESCAPED_UNICODE);
            }            
        } else {
            $flag['msg'] = "El parametro <user> no puede estar vacio";
            return \Response::json(['success' => $flag], 400, ['Content-Type' => 'application/json;charset=utf8'], JSON_UNESCAPED_UNICODE);
        }     

        return \Response::json(['success' => $flag], 200, ['Content-Type' => 'application/json;charset=utf8'], JSON_UNESCAPED_UNICODE);
    }

    public function myTravels($id_user, $date_start, $date_end){
        $myTravels = TravelModel::whereBetween('created_at', [$date_start, $date_end])
                                ->where('user_id', $id_user)
                                ->get();

        return \Response::json(['success' => $myTravels], 200, ['Content-Type' => 'application/json;charset=utf8'], JSON_UNESCAPED_UNICODE);
    }

    public function myLastTravels($id_user){
        $myTravels = TravelModel::where('user_id', $id_user)
                                ->take(10)
                                ->get();

        return \Response::json(['success' => $myTravels], 200, ['Content-Type' => 'application/json;charset=utf8'], JSON_UNESCAPED_UNICODE);
    }
}
