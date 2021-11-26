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

    <div class="card" style="border-radius: 20px">
        <div class="card-header" style="color: #000; background-color: #ffd040; border-top-right-radius:20px; border-top-left-radius:20px">
            <h3 class="card-title">Viajes</h3>
        </div>

        <div class="card-body">
            <div class="row">
                
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header d-flex justify-content-center">
                            <h3 class="card-title">Información de la Tarjeta.</h3>
                        </div>

                        <form action="{{ route('paysingle.create') }}" method="post" id="cardForm">

                            <div class="card-body">
                                
                                    @csrf  
                                    <div class="form-group">
                                        <input class="form-control" id="card-holder-name" type="text" placeholder="Ingrese el nombre del titular" required>
                                        <span id="cardErrors"></span>
                                    </div>
                                    
                                    <!-- Stripe Elements Placeholder -->
                                    <div class="form-group">
                                        <div class="form-control" id="card-element"></div>
                                    </div>
                                    
                            </div>
                            
                            <div class="card-footer" style="display: flex; justify-content: flex-end">
                                <button class="btn" style="color: #000; background-color: #87d1e6;" id="card-button">
                                    Procesar pago
                                </button>
                            </div>
                        </form>
                            
                        
                    </div>
                </div>

                <article class="col-md-6">
                    <h4 class="d-flex justify-content-center">Información del Viaje</h4>
                    <div class="row d-flex justify-content-center">
                        <img src="{{ asset('/img/tarjeta_de_credito.png') }}" style="width:35%;" alt="">
                    </div>

                    <hr>
                    <p>Precio: $20MXN</p>
                    <p>Descripción:</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sagittis magna at dui vulputate mattis. Nulla facilisi. Vivamus finibus arcu vitae aliquet lobortis.</p>
                </article>


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