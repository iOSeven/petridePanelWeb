<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Pets;
use App\Models\User;

class PetController extends Controller
{
    public function saveNewPet($user, $name, $size, $type){
        if(!empty($user) && !is_null($user)){
            if(!empty($name) && !is_null($name)){
                if(!empty($size) && !is_null($size)){
                    if(!empty($type) && !is_null($type)){
                        $user_id = User::find($user);

                        if($user_id != null){
                            $pet = Pets::create([
                                'user_id' => $user,
                                'name' => $name,
                                'size' => $size,
                                'type' => $type,
                            ]);
                    
                            if($pet){
                                $flag['status'] = true;
                                $flag['msg'] = "Mensaje guardado correctamente.";
                                return \Response::json(['success' => $flag], 200, ['Content-Type' => 'application/json;charset=utf8'], JSON_UNESCAPED_UNICODE);
                            }
                        } else {
                            $flag['msg'] = "El usuario no existe";
                            return \Response::json(['success' => $flag], 400, ['Content-Type' => 'application/json;charset=utf8'], JSON_UNESCAPED_UNICODE);
                        }
                    } else {
                        $flag['msg'] = "El parametro <tipo> no puede estar vacio";
                        return \Response::json(['success' => $flag], 400, ['Content-Type' => 'application/json;charset=utf8'], JSON_UNESCAPED_UNICODE);
                    }
                } else {
                    $flag['msg'] = "El parametro <tamaño> no puede estar vacio";
                    return \Response::json(['success' => $flag], 400, ['Content-Type' => 'application/json;charset=utf8'], JSON_UNESCAPED_UNICODE);
                }
            } else {
                $flag['msg'] = "El parametro <nombre> no puede estar vacio";
                return \Response::json(['success' => $flag], 400, ['Content-Type' => 'application/json;charset=utf8'], JSON_UNESCAPED_UNICODE);
            }
        } else {
            $flag['msg'] = "El parametro <usuario> no puede estar vacio";
            return \Response::json(['success' => $flag], 400, ['Content-Type' => 'application/json;charset=utf8'], JSON_UNESCAPED_UNICODE);
        }

        return \Response::json(['success' => $flag], 200, ['Content-Type' => 'application/json;charset=utf8'], JSON_UNESCAPED_UNICODE);
    }
}
