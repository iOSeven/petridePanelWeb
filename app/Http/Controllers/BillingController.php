<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BillingController extends Controller
{
    public function index(){

        $paymentsMethods = auth()->user()->paymentMethods();

        return view('facturas.index', [
            'intent' => auth()->user()->createSetupIntent(),
            'paymentsMethods' => $paymentsMethods
        ]);
    }

    public function paymentmethod(Request $request)
    {
        // aquí ->tabla y ->nombre son las claves tabla:... y nombre:... 
        $paymentMethod = $request->paymentMethod;

        auth()->user()->addPaymentMethod($paymentMethod);

        return $this->index();
    }

    public function deletepaymentmethod($paymentMethodId) {
        $paymentMethod = auth()->user()->findPaymentMethod($paymentMethodId);
        $paymentMethod->delete();

        return $this->index();
    }
}
