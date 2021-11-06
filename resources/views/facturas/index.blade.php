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

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Facturas</h3>
        </div>

        <div class="card-body">

            <article class="card">
                <form action="{{ route('paymentmethod.create') }}" method="post" id="cardForm">
                    @csrf  
                    <div class="card-body">

                        <h1>Agregar metodo de pago</h1>

                        <div class="row">
                            <p>Informacion de tarjeta</p>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <input class="form-control" id="card-holder-name" type="text" placeholder="Nombre del titular" required>
                                </div>
                                
                                <!-- Stripe Elements Placeholder -->
                                <div>
                                    <div class="form-control" id="card-element"></div>
                                    <span id="cardErrors"></span>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bd-gray justify-end">
                        <button class="btn btn-primary" id="card-button" data-secret="{{ $intent->client_secret }}">
                            Update Payment Method
                        </button>
                    </div>
                
                </form>
            </article>
            
        </div>
    </div>

    <div class="card">
        <div class="bg-gray-50">
            <h1>Metodos de pago agregados</h1>
        </div>
        @if(!empty($paymentsMethods))
            <div class="card-body">
                @foreach($paymentsMethods as $paymentsMethod)
                    <article class="text-sm text-gray">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h5><span class="font-bold">{{ $paymentsMethod->billing_details->name }}</span> xxxx-{{ $paymentsMethod->card->last4 }}</h1>
                                <p>Expira {{ $paymentsMethod->card->exp_month}} / {{ $paymentsMethod->card->exp_year}}</p>
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
                        </div>
                        
                    </article>
                @endforeach
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
