<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class AccessApiController extends Controller
{
    public function checklogin($email=null, $pass=null) {
        if(!empty($email) && !is_null($email)) {
            if(!empty($pass) && !is_null($pass)) {
                $user = User::where('email', $email)->first();
                if(!is_null($user)) {
                    $checkPass = \Hash::check($pass, $user->password);
                    if ($checkPass) {

                        //dd($user);
                         
                        $flag['status'] = $checkPass;
                        $flag['msg'] = "Usuario Valido";
                        $flag['id_user'] = $user->id;
                        $flag['id_role'] = $user->role->name;
                    } else {
                        $flag['msg'] = "El correo o password no son correctos";
                    }
                } else {
                    $flag['msg'] = "El usuario no existe";
                }
            } else {
                $flag['msg'] = "El password no puede venir vacio";
            }
        } else {
            $flag['msg'] = "El correo no puede venir vacio";
        }
        return \Response::json(['success' => $flag], 200, ['Content-Type' => 'application/json;charset=utf8'], JSON_UNESCAPED_UNICODE);
    }
}
