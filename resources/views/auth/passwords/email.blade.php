@extends('layouts.app_uidashboard', [
    'namePage' => 'Reset Password',
    'class' => 'login-page sidebar-mini ',
    'activePage' => '',
    'backgroundImage' => "../" . asset('img') . "background.jpg",
])

@section('content')
    <div class="content">
        <div class="container">
            <div class="row">

                <div class="col-md-6 ml-auto mr-auto">
                    <div class="card card-signup text-center" style="border-radius: 50px;">
                        <form role="form" method="POST" action="{{ route('password.email') }}">
                            @csrf
                            
                                <div class="card-header ">
                                    <h4 class="card-title">Recuperar Contraseña</h4>
                                </div>
                                <div class="card-body ">
                                    <div class="card-body">
                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="input-group no-border form-control-lg {{ $errors->has('email') ? ' has-danger' : '' }}">
                                        <span class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="far fa-envelope"></i>
                                            </div>
                                        </span>
                                        <input id="email" type="email" placeholder="Correo" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    </div>
                                    @error('email')
                                        <span style="display:block;" class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="card-footer ">
                                    <button  type = "submit" class="btn btn-warning btn-round btn-lg btn-block mb-3"
                                        style="color: #000">Recuperar</button>
                                </div>
                            
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection


@push('js')

@endpush