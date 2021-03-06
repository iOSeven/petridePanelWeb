<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\socioRider;
use App\Models\TipoServicioModel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SolicitudesController extends Controller
{
    public function index(){

        $servicios = TipoServicioModel::select('id', 'name')
                        ->orderBy('id', 'DESC')->get();

        $solicitudes = User::select('id','name', 'lastname1', 'lastname2', 'role_id', 'email', 'estatus')
                        ->where('estatus', 'Pendiente')
                        ->orWhere('estatus', 'Rechazado')
                        ->where('role_id', '>', 1)
                        ->orderBy('id', 'DESC')->get();
                        
        foreach($solicitudes as $solicitud){
            $servicioName = TipoServicioModel::select('id', 'name')
                        ->where('id', $solicitud->role_id)->get();

            $solicitud->id_tipo_servicio = $servicioName[0]->id;
            $solicitud->tipo_servicio = $servicioName[0]->name;
        }

        return view('solicitudes.index', compact(['solicitudes', 'servicios']));
    }

    public function update(Request $request, $id){
        $solicitud = User::findOrFail($id);

        $solicitud->name = $request->input('name');
        $solicitud->lastname1 = $request->input('lastname1');
        $solicitud->lastname2 = $request->input('lastname2');
        $solicitud->email = $request->input('email');
        
        if(!empty($request->input('password')))
            $solicitud->password = Hash::make($request->input('password'));
        
        $solicitud->estatus = $request->input('estatus');
        $solicitud->role_id = $request->input('tipo');

        $solicitud->save();

        return redirect('admin/solicitudes')->with('success', 'Datos actualizados');
    }

    public function destroy($id)
    {
        $user = User::find($id)->delete();
        $data_user = socioRider::where('user_id', $id)->delete();

        return redirect('admin/solicitudes')->with('success', 'Datos borrados');
    }
}
