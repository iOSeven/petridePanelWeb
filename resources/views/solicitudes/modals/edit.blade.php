<div class="modal fade" id="modal-default{{ $solicitud->id }}" style="display: none;" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">SOLICITID No. <label id="numero" name="numero">{{ $solicitud->id }}</label></h4>
                            <button type="button" class="close bg-red" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            
                          <form id="myForm" name="myForm" method="POST" action="{{ route('solicitudes.update', $solicitud->id) }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" value="{{ $solicitud->name }}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Lastname1') }}</label>

                                    <div class="col-md-6">
                                        <input id="lastname1" type="text" value="{{ $solicitud->lastname1 }}" class="form-control @error('lastname1') is-invalid @enderror" name="lastname1" value="{{ old('lastname1') }}" required autocomplete="lastname1" autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Lastname2') }}</label>

                                    <div class="col-md-6">
                                        <input id="lastname2" type="text" value="{{ $solicitud->lastname2 }}" class="form-control @error('lastname2') is-invalid @enderror" name="lastname2" value="{{ old('lastname2') }}" required autocomplete="lastname2" autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" value="{{ $solicitud->email }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                                    </div>
                                </div>

                                <div class="form-group row">
                                  <label for="tipo" class="col-md-4 col-form-label text-md-right">{{ __('Tipo') }}</label>
                                    <div class="col-md-6">
                                        <select class="form-control" id="tipo" name="tipo" required>
                                            <option value="">Seleccione tipo de servicio</option>
                                            @foreach($servicios as $pos => $servicio)
                                                <option value="{{ $servicio->id }}" {{ ( $servicio->id == $solicitud->id_tipo_servicio) ? 'selected' : '' }}>{{ $servicio->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                  <label for="estatus" class="col-md-4 col-form-label text-md-right">{{ __('Estatus') }}</label>
                                    <div class="col-md-6">
                                        <select class="form-control" id="estatus" name="estatus" required>
                                            <option value="">Seleccione tipo de estatus</option>
                                              <option value="Aprobado" {{ ($solicitud->estatus == "Aprobado") ? 'selected' : '' }}>Aprobado</option>
                                              <option value="Pendiente" {{ ($solicitud->estatus == "Pendiente") ? 'selected' : '' }}>Pendiente</option>
                                              <option value="Rechazado" {{ ($solicitud->estatus == "Rechazado") ? 'selected' : '' }}>Rechazado</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                      {{ method_field('PUT') }}
                                        <button type="submit" class="btn btn-success">
                                            {{ __('Actualizar') }}
                                        </button>
                                    </div>
                                </div>
                            </form>

                          </div>
                        
                        </div>
                        <!-- /.modal-content -->
                    </div>