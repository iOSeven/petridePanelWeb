<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\socioRider;
use App\Models\Transportadoras;
use Illuminate\Support\Facades\Hash;

class AccessApiController extends Controller
{
    public function checklogin($email=null, $pass=null) {
        if(!empty($email) && !is_null($email)) {
            if(!empty($pass) && !is_null($pass)) {
                $user = User::where('email', $email)->first();
                if(!is_null($user)) {
                    $checkPass = \Hash::check($pass, $user->password);
                    if ($checkPass) {
                        $flag['status'] = $checkPass;
                        $flag['msg'] = "Usuario Valido";
                        $flag['id_user'] = $user->id;
                        $flag['role_id'] = $user->role->name;
                    } else {
                        $flag['msg'] = "El correo o password no son correctos";
                        return \Response::json(['success' => $flag], 400, ['Content-Type' => 'application/json;charset=utf8'], JSON_UNESCAPED_UNICODE);
                    }
                } else {
                    $flag['msg'] = "El usuario no existe";
                    return \Response::json(['success' => $flag], 400, ['Content-Type' => 'application/json;charset=utf8'], JSON_UNESCAPED_UNICODE);
                }
            } else {
                $flag['msg'] = "El password no puede venir vacio";
                return \Response::json(['success' => $flag], 400, ['Content-Type' => 'application/json;charset=utf8'], JSON_UNESCAPED_UNICODE);
            }
        } else {
            $flag['msg'] = "El correo no puede venir vacio";
            return \Response::json(['success' => $flag], 400, ['Content-Type' => 'application/json;charset=utf8'], JSON_UNESCAPED_UNICODE);
        }
        return \Response::json(['success' => $flag], 200, ['Content-Type' => 'application/json;charset=utf8'], JSON_UNESCAPED_UNICODE);
    }

    public function addUser($name=null, $lastname1=null, $lastname2=null, $email=null, $pass=null, $role=null) {
        if(!empty($name) && !is_null($name)) {
            if(!empty($lastname1) && !is_null($lastname1)) {
                if(!empty($lastname2) && !is_null($lastname2)) {
                    if(!empty($email) && !is_null($email)) {
                        $user = User::where('email', $email)->first();
                        if(is_null($user)) {
                            if(!empty($pass) && !is_null($pass)) {
                                if(!empty($role) && !is_null($role)) {
                                    $user = User::create([
                                        'name' => $name,
                                        'lastname1' => $lastname1,
                                        'lastname2' => $lastname2,
                                        'email' => $email,
                                        'password' => Hash::make($pass),
                                        'role_id' => $role,
                                    ]);
                                    
                                    $flag['status'] = true;
                                    $flag['msg'] = "Usuario Agregado";
                                    $flag['id_user'] = $user->id;

                                    $user_data = socioRider::create([
                                        'user_id' => $user->id,
                                    ]);
                            
                                    $user_transportadora = Transportadoras::create([
                                        'user_id' => $user->id,
                                    ]);
                                    
                                    //Agregar cliente a stripe
                                    $user->createAsStripeCustomer();
                                } else {
                                    $flag['msg'] = "El Rol no puede venir vacio";
                                }
                            } else {
                                $flag['msg'] = "El passwod no puede venir vacio";
                            }
                        } else {
                            $flag['msg'] = "El email ya se encuentra registrado";
                            return \Response::json(['success' => $flag], 400, ['Content-Type' => 'application/json;charset=utf8'], JSON_UNESCAPED_UNICODE);
                        }
                    } else {
                        $flag['msg'] = "El email no puede venir vacio";
                        return \Response::json(['success' => $flag], 400, ['Content-Type' => 'application/json;charset=utf8'], JSON_UNESCAPED_UNICODE);
                    }
                } else {
                    $flag['msg'] = "El apellido materno no puede venir vacio";
                    return \Response::json(['success' => $flag], 400, ['Content-Type' => 'application/json;charset=utf8'], JSON_UNESCAPED_UNICODE);
                }
            } else {
                $flag['msg'] = "El apellido paterno no puede venir vacio";
                return \Response::json(['success' => $flag], 400, ['Content-Type' => 'application/json;charset=utf8'], JSON_UNESCAPED_UNICODE);
            }
        } else {
            $flag['msg'] = "El nombre no puede venir vacio";
            return \Response::json(['success' => $flag], 400, ['Content-Type' => 'application/json;charset=utf8'], JSON_UNESCAPED_UNICODE);
        }

        return \Response::json(['success' => $flag], 200, ['Content-Type' => 'application/json;charset=utf8'], JSON_UNESCAPED_UNICODE);
    }

    public function authUser($id=null){
        if(!empty($id) && !is_null($id)) {
            $user = User::where('id', $id)->first();
            if(!is_null($user)) {
                $flag['status'] = true;
                $flag['msg'] = "Usuario Valido";
                $flag['id_user'] = $user->id;
                $flag['role_id'] = $user->role->name;
                $flag['email'] = $user->email;
            } else {
                $flag['msg'] = "El usuario no existe";
                return \Response::json(['success' => $flag], 400, ['Content-Type' => 'application/json;charset=utf8'], JSON_UNESCAPED_UNICODE);
            }
        } else {
            $flag['msg'] = "El usuario no existe";
            return \Response::json(['success' => $flag], 400, ['Content-Type' => 'application/json;charset=utf8'], JSON_UNESCAPED_UNICODE);
        }

        return \Response::json(['success' => $flag], 200, ['Content-Type' => 'application/json;charset=utf8'], JSON_UNESCAPED_UNICODE);
    }
}