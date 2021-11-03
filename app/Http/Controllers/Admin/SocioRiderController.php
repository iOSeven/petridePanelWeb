<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\socioRider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SocioRiderController extends Controller
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
     * @param  \App\Models\socioRider  $socioRider
     * @return \Illuminate\Http\Response
     */
    public function show(socioRider $socioRider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\socioRider  $socioRider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_info = socioRider::where('user_id', $id)->get();

        return view('usuarios.more_info', compact('user_info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\socioRider  $socioRider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user_info = socioRider::findOrFail($id);

        $user_info->FechaNacimiento = $request->input('FechaNacimiento');
        $user_info->Sexo = $request->input('Sexo');
        $user_info->Domicilio = $request->input('Domicilio');
        $user_info->Colonia = $request->input('Colonia');
        $user_info->CodigoPostal = $request->input('CodigoPostal');
        $user_info->Estado = $request->input('Estado');
        $user_info->Celular = $request->input('Celular');
        $user_info->EstadoCivil = $request->input('EstadoCivil');
        $user_info->NivelEstudios = $request->input('NivelEstudios');
        $user_info->SituacionLaboral = $request->input('SituacionLaboral');
        $user_info->FotoIdentificacion = $request->input('FotoIdentificacion');
        $user_info->FotoSeguroCobertura = $request->input('FotoSeguroCobertura');
        $user_info->FotoConstanciaFiscal = $request->input('FotoConstanciaFiscal');
        $user_info->FotoPerfil = $request->input('FotoPerfil');
        $user_info->NoCuenta = $request->input('NoCuenta');
        $user_info->CLABE = $request->input('CLABE');
        $user_info->CER = $request->input('CER');
        $user_info->KEY = $request->input('KEY');
        $user_info->Password = $request->input('Password');
        $user_info->TipoAutomovil = $request->input('TipoAutomovil');
        $user_info->Placas = $request->input('Placas');
        $user_info->ColorAutomovil = $request->input('ColorAutomovil');
        $user_info->PolizaSeguro = $request->input('PolizaSeguro');
        $user_info->VigenciaSeguro = $request->input('VigenciaSeguro');
        $user_info->LicenciaConducir = $request->input('LicenciaConducir');
        $user_info->VigenciaLicencia = $request->input('VigenciaLicencia');

        $user_info->save();

        //return redirect('admin/usuarios')->with('success', 'Datos actualizados');
        return $this->edit($user_info->user_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\socioRider  $socioRider
     * @return \Illuminate\Http\Response
     */
    public function destroy(socioRider $socioRider)
    {
        //
    }
}
