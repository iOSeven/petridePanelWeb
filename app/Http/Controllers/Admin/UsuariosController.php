<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\TipoServicioModel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicios = TipoServicioModel::select('id', 'name')
                        ->orderBy('id', 'DESC')->get();

        //Bloque de la tabla 1
        $socios = User::select('id','name', 'lastname1', 'lastname2', 'role_id', 'email', 'estatus')
                        ->where('estatus', 'Aprobado')
                        ->where('role_id', 1)
                        ->orderBy('id', 'DESC')->get();
                        
        foreach($socios as $socio){
            $servicioName = TipoServicioModel::select('id', 'name')
                        ->where('id', $socio->role_id)->get();

            $socio->id_tipo_servicio = $servicioName[0]->id;
            $socio->tipo_servicio = $servicioName[0]->name;
        }

        //Bloque de la tabla 2
        $usuarios = User::select('id','name', 'lastname1', 'lastname2', 'role_id', 'email', 'estatus')
                        ->where('role_id', 2)
                        ->where('estatus', 'Aprobado')
                        ->orWhere('role_id', 4)
                        ->where('estatus', 'Aprobado')
                        ->orWhere('role_id', 5)
                        ->where('estatus', 'Aprobado')
                        ->orderBy('id', 'DESC')->get();
                        
        foreach($usuarios as $usuario){
            $servicioName = TipoServicioModel::select('id', 'name')
                        ->where('id', $usuario->role_id)->get();

            $usuario->id_tipo_servicio = $servicioName[0]->id;
            $usuario->tipo_servicio = $servicioName[0]->name;
        }

        //Bloque de la tabla 3
        $clientes = User::select('id','name', 'lastname1', 'lastname2', 'role_id', 'email', 'estatus')
                        ->where('role_id', 3)
                        ->where('estatus','=', 'Aprobado')
                        ->orderBy('id', 'DESC')->get();
                        
        foreach($clientes as $cliente){
            $servicioName = TipoServicioModel::select('id', 'name')
                        ->where('id', $cliente->role_id)->get();

            $cliente->id_tipo_servicio = $servicioName[0]->id;
            $cliente->tipo_servicio = $servicioName[0]->name;
        }

        return view('usuarios.index', compact(['servicios', 'socios', 'usuarios', 'clientes']));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);

        $usuario->name = $request->input('name');
        $usuario->lastname1 = $request->input('lastname1');
        $usuario->lastname2 = $request->input('lastname2');
        $usuario->email = $request->input('email');
        
        if(!empty($request->input('password')))
            $usuario->password = Hash::make($request->input('password'));
        
        $usuario->estatus = $request->input('estatus');
        $usuario->role_id = $request->input('tipo');

        $usuario->save();

        return redirect('admin/usuarios')->with('success', 'Datos actualizados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
