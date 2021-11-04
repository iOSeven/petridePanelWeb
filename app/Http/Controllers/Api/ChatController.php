<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Chat;
use App\Models\User;

class ChatController extends Controller
{
    public function saveMessage($from, $to, $message){
        if(!empty($from) && !is_null($from)){
            if(!empty($to) && !is_null($to)){
                if(!empty($message) && !is_null($message)){
                    $user_from = User::find($from);
                    $user_to = User::find($to);
                    if($user_from != null){
                        if($user_to != null){
                            if($from != $to){
                                $chat = Chat::create([
                                    'de' => $from,
                                    'para' => $to,
                                    'mensaje' => $message,
                                ]);
                        
                                if($chat){
                                    $flag['status'] = true;
                                    $flag['msg'] = "Mensaje guardado correctamente.";
                                }
                            } else {
                                $flag['msg'] = "El usuario <de> y <para> no pueden ser iguales";
                            }
                        } else {
                            $flag['msg'] = "El usuario <para> no existe";
                        }
                    } else {
                        $flag['msg'] = "El usuario <de> no existe";
                    }
                } else {
                    $flag['msg'] = "El parametro <mensaje> no puede estar vacio";
                }
            } else {
                $flag['msg'] = "El parametro <para> no puede estar vacio";
            }
        }else {
            $flag['msg'] = "El parametro <de> no puede estar vacio";
        }

        return \Response::json(['success' => $flag], 200, ['Content-Type' => 'application/json;charset=utf8'], JSON_UNESCAPED_UNICODE);
    }
}
