@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Viajes</h1>
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
        <div class="card-body">
            <div class="row">
                <article class="col-md-7">
                    <div class="row justify-between items-center self-start flex-1">
                        <img src="{{ asset('/img/config/transporte.png') }}" style="width:25%;" alt="">
                        <h4>Viaje</h4>
                        <p>Precio $20MXN</p>
                    </div>

                    <hr>

                    <p>sdkjfhsdkjfhsdkjfhskjdhfksdhfjkhsjkdhfshfkhsdkfhsdfhskjh</p>
                </article>

                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('paysingle.create') }}" method="post" id="cardForm">
                                @csrf  
                                <div class="form-group">
                                    <label for="">Nombre de la Tarjeta</label>
                                    <input class="form-control" id="card-holder-name" type="text" placeholder="Ingrese el nombre del titular" required>
                                    <span id="cardErrors"></span>
                                </div>
                                
                                <!-- Stripe Elements Placeholder -->
                                <div class="form-group">
                                    <label for="">Numero de la Tarjeta</label>
                                    <div class="form-control" id="card-element"></div>
                                </div>
                                

                                <button class="btn btn-primary" id="card-button">
                                    Process Payment
                                </button>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
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


        //Metodo de pago
        const cardHolderName = document.getElementById('card-holder-name');
        const cardButton = document.getElementById('card-button');
        const cardForm = document.getElementById('cardForm');

        cardForm.addEventListener('submit', async (e) => {

            e.preventDefault();

            const { paymentMethod, error } = await stripe.createPaymentMethod(
                'card', cardElement, {
                    billing_details: { name: cardHolderName.value }
                }
            );

            if (error) {
                document.getElementById('cardErrors').textContent = error.message;
            } else {
                stripeTokenHandlerSingle(paymentMethod.id);
            }
        });

        // Submit the form with the token ID.
        function stripeTokenHandlerSingle(paymentMethod) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('cardForm');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'paymentMethodId');
            hiddenInput.setAttribute('value', paymentMethod);
            form.appendChild(hiddenInput);

            // Submit the form
            form.submit();
        }
    </script>
@stop