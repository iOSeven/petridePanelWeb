@extends('layouts.app_uidashboard', [
    'namePage' => 'Login page',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'login',
    'backgroundImage' => asset('img') . "/background.jpg",
])

@section('content')
    <div class="content">
        <div class="container">
        
        <div class="col-md-4 ml-auto mr-auto">
            <form role="form" method="POST" action="{{ route('login') }}">
                @csrf
            <div class="card card-login card-plain">
                <div class="card-header ">
                <div class="logo-container">
                    <img src="{{ asset('img/petride_logo_login.png') }}" alt="">
                </div>
                </div>
                <div class="card-body ">
                <div class="input-group no-border form-control-lg {{ $errors->has('email') ? ' has-danger' : '' }}">
                    <span class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-user-alt"></i>
                    </div>
                    </span>
                    <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Usuario" type="email" name="email" value="{{ old('email') }}" required autofocus>
                </div>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                <div class="input-group no-border form-control-lg {{ $errors->has('password') ? ' has-danger' : '' }}">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fas fa-lock"></i>
                        </div>
                    </div>
                    <input placeholder="Contraseña" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" type="password" value="secret" required>
                </div>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
                </div>
                <div class="card-footer ">
                    <button  type = "submit" class="btn btn-primary btn-round btn-lg btn-block mb-3 ">Entrar</button>
                    <div class="pull-center" style="font-size: 14px; text-align: center;">
                        ¿Olvidaste tu <a href="{{ route('password.request') }}" class="link footer-link">contraseña</a>?       
                    </div>

                    <div class="pull-center" style="font-size: 14px; text-align: center">
                        ¿No tienes una cuenta? <a href="{{ route('register') }}" class="link footer-link">Registrate aquí</a>
                    </div>
                
                </div>
            </div>
            </form>
        </div>
        </div>
    </div>
@endsection

@push('js')
    
@endpush
