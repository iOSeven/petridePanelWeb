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

        if(auth()->user()->hasPaymentMethod()){
            auth()->user()->addPaymentMethod($paymentMethod);
        } else {
            auth()->user()->updateDefaultPaymentMethod($paymentMethod);
        }

        

        return $this->index();
    }

    public function deletepaymentmethod($paymentMethodId) {
        $paymentMethod = auth()->user()->findPaymentMethod($paymentMethodId);
        $paymentMethod->delete();

        return $this->index();
    }

    public function defaultpaymentmethod($paymentMethodId) {
        auth()->user()->updateDefaultPaymentMethod($paymentMethodId);

        return $this->index();
    }
}
