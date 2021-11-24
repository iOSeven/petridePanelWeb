@extends('layouts.app_uidashboard', [
    'namePage' => 'Register page',
    'activePage' => 'register',
    'backgroundImage' => asset('img') . "background.jpg",
])

@section('content')
  <div class="content">
    <div class="container">
      <div class="row">
        
        <div class="col-md-6 offset-md-3">
          <div class="card card-signup text-center" style="border-radius: 50px;">
            <div class="card-header ">
                <img src="{{ asset('img/favicon.png') }}" style="width: 15%;" />
                <h4 class="card-title">Registro</h4>
            </div>
            <div class="card-body ">
              <form method="POST" action="{{ route('register') }}">
                @csrf
                <!--Begin input name -->

                <div class="form-group row">

                    <div class="col-md-12">
                        <input id="name" type="text" placeholder="Nombre(s)" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-md-12">
                        <input id="lastname1" type="text" placeholder="Apellido Paterno" class="form-control @error('lastname1') is-invalid @enderror" name="lastname1" value="{{ old('lastname1') }}" required autocomplete="lastname1" autofocus>

                        @error('lastname1')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-md-12">
                        <input id="lastname2" type="text" placeholder="Apellido Materno" class="form-control @error('lastname2') is-invalid @enderror" name="lastname2" value="{{ old('lastname2') }}" required autocomplete="lastname2" autofocus>

                        @error('lastname2')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    
                    <div class="col-md-12">
                        <input id="email" type="email" placeholder="Correo" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                
                    <div class="col-md-12">
                        <input id="password" type="password" placeholder="Contraseña" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    
                    <div class="col-md-12">
                        <input id="password-confirm" placeholder="Confirmar Contraseña" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="form-check text-left">
                  <label class="form-check-label">
                    <input class="form-check-input" type="checkbox">
                    <span class="form-check-sign"></span>
                    Acepto los
                    <a href="#something">términos y condiciones.</a>.
                  </label>
                </div>
                <div class="card-footer ">
                  <button type="submit" class="btn btn-warning btn-round btn-lg" style="color: #000;">Registrarme</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>
@endsection

@push('js')
  
@endpush
