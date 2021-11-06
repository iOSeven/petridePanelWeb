<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BillingController extends Controller
{
    public function index(){
        return view('facturas.index', [
            'intent' => auth()->user()->createSetupIntent()
        ]);
    }

    public function paymentmethod(Request $request)
    {
        // aquí ->tabla y ->nombre son las claves tabla:... y nombre:... 
        $paymentMethod = $request->paymentMethod;

        auth()->user()->addPaymentMethod($paymentMethod);

        // El método json establecerá automáticamente el encabezado 'Content-Type' en 'application/json', así como también convertirá el array dado a JSON
        return response()->json(['data' => 'Metodo Agregado']);
    }
}
