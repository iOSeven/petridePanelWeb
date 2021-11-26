@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Facturación</h1>
@stop

@section('content')

    @if(\Session::has('success'))

    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Alerta!</h4>
        {{ \Session::get('success') }}
    </div>

    @endif

    <div class="card" style="border-radius: 20px">
        <div class="card-header" style="color: #000; background-color: #ffd040; border-top-right-radius:20px; border-top-left-radius:20px">
            <h3 class="card-title">Facturas</h3>
        </div>

        <div class="card-body">

            <article class="card">
                <form action="{{ route('paymentmethod.create') }}" method="post" id="cardForm">
                    @csrf  
                    <div class="card-body">

                        <div class="row">
                            
                            <div class="col-md-6">
                                <h5>Agregar metodo de pago</h5>
                                <p>Informacion de tarjeta</p>

                                <div class="form-group row">
                                    <input class="form-control" id="card-holder-name" type="text" placeholder="Nombre del titular" required>
                                </div>
                                
                                <!-- Stripe Elements Placeholder -->
                                <div class="form-group row">
                                    <div class="form-control" id="card-element"></div>
                                    <span id="cardErrors"></span>
                                </div>
                                
                            </div>

                            <div class="col-md-6 d-flex justify-content-center">
                                <img src="{{ asset('img/tarjeta_de_credito.png') }}" alt="tarjeta_de_credito" style="width: 35%;">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer" style="display: flex; justify-content: flex-end">
                        <div class="col-md-3">
                            <button class="btn btn-block" id="card-button" style="color: #000; background-color: #87d1e6;" data-secret="{{ $intent->client_secret }}">
                                Agregar
                            </button>
                        </div>
                    </div>
                
                </form>
            </article>
            
        </div>
    </div>

    <div class="card" style="border-radius: 20px">
        <div class="card-header" style="color: #000; background-color: #ffd040; border-top-right-radius:20px; border-top-left-radius:20px">
            <h3 class="card-title">Métodos de pago agregados.</h3>
        </div>
        @if(!empty($paymentsMethods))
            <div class="card-body">
                @foreach($paymentsMethods as $paymentsMethod)
                    <div class="card text-sm text-gray col-md-8" style="background-color: #87d1e6;">
                        <div class="card-body">
                            <div>
                                <h5>
                                    Nombre del Títular: <span class="font-bold">{{ $paymentsMethod->billing_details->name }}</span> 
                                    
                                    @if($paymentsMethod->id == auth()->user()->defaultPaymentMethod()->id)
                                        (Default)
                                    @endif
                                </h1>
                                Tarjeta con terminación: <span class="font-bold">xxxx-{{ $paymentsMethod->card->last4 }}</span>

                                <p>Expira {{ $paymentsMethod->card->exp_month}} / {{ $paymentsMethod->card->exp_year}}</p>
                            </div>

                            <div class="row d-flex justify-content-end">
                                @unless($paymentsMethod->id == auth()->user()->defaultPaymentMethod()->id)
                                <div>
                                    <form action="{{ route('paymentmethod.default', $paymentsMethod->id) }}" method="POST">
                                        @csrf
                                        @method("POST")
                                        <button type="submit" class="btn">
                                            <i class="fas fa-star"></i>
                                        </button>
                                    </form>
                                    
                                </div>
                                
                                <div>
                                    <form action="{{ route('paymentmethod.delete', $paymentsMethod->id) }}" method="POST">
                                        @csrf
                                        @method("POST")
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                                @endunless
                            </div>
                        </div>
                        
                    </div>
                @endforeach
            </div>
        @else
            <div class="card-body">
                <article>
                    <h4>No cuentas con ningun metodo de pago agregado.</h4>
                </article>
            </div>
        @endif
    </div>

@stop

@section('css')
    <!--<link rel="stylesheet" href="/css/admin_custom.css">-->
@stop

@section('js')
<script src="https://js.stripe.com/v3/"></script>

<script>
    const stripe = Stripe("{{ env('STRIPE_KEY') }}");

    const elements = stripe.elements();
    const cardElement = elements.create('card');

    cardElement.mount('#card-element');

    //Enviar parametros a Stripe
    const cardHolderName = document.getElementById('card-holder-name');
    const cardButton = document.getElementById('card-button');
    const cardForm = document.getElementById('cardForm');
    const clientSecret = cardButton.dataset.secret;

    cardForm.addEventListener('submit', async (e) => {

        e.preventDefault();

        const { setupIntent, error } = await stripe.confirmCardSetup(
            clientSecret, {
                payment_method: {
                    card: cardElement,
                    billing_details: { name: cardHolderName.value }
                }
            }
        );

        if (error) {
            document.getElementById('cardErrors').textContent = error.message;
        } else {
            //console.log(setupIntent.payment_method);
            stripeTokenHandler(setupIntent.payment_method);
        }
    });


    // Submit the form with the token ID.
    function stripeTokenHandler(paymentMethod) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('cardForm');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'paymentMethod');
        hiddenInput.setAttribute('value', paymentMethod);
        form.appendChild(hiddenInput);

        // Submit the form
        form.submit();
    }
</script>
@stop
