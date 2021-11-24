@extends('layouts.app_uidashboard', [
    'namePage' => 'Reset Password',
    'class' => 'login-page sidebar-mini ',
    'activePage' => '',
    'backgroundImage' => asset('assets') . "/img/bg14.jpg"
])

@section('content')
  <div class="content">
    <div class="container">
      <div class="col-md-6 ml-auto mr-auto">
        <form role="form" method="POST" action="{{ route('password.update') }}">
          @csrf
          <input type="hidden" name="token" value="{{ $token }}">
          <div class="card card-signup text-center" style="border-radius: 50px;">
            <div class="card-header ">
                <h4 class="card-title">Cambiar Contraseña</h4>
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
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Correo">
              </div>
              @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
              <div class="input-group no-border form-control-lg">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-key"></i>
                    </div>
                </div>
                 <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Contraseña" required>
              </div>
              @if ($errors->has('password'))
                <span class="invalid-feedback" style="display: block;" role="alert">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
              @endif
              <div class="input-group no-border form-control-lg {{ $errors->has('password') ? ' has-danger' : '' }}">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-key"></i>
                  </div>
                </div>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmar Contraseña">
              </div>
              @if ($errors->has('password'))
                <span class="invalid-feedback" style="display: block;" role="alert">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
              @endif
            </div>
            <div class="card-footer ">
              <button  type = "submit" class="btn btn-warning btn-round btn-lg btn-block mb-3" style="color: #000">Cambiar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      demo.checkFullPageBackgroundImage();
    });
  </script>
@endpush