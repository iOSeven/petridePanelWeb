<div class="modal fade" id="modal-default{{ $socio->id }}" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 20px">
            <div class="modal-header" style="color: #000; background-color: #ffd040; border-top-right-radius:20px; border-top-left-radius:20px">
                <h5 class="modal-title">Editar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #000">
                    <span aria-hidden="true">X</span>
                </button>
            </div>

            <div class="modal-body">
            
                <form id="myForm" name="myForm" method="POST" action="{{ route('usuarios.update', $socio->id) }}">
                    @csrf

                    <div class="form-group row">
                        <div class="col-md-12">
                            <input id="name" type="text" style="text-align: center;" placeholder="Nombre" value="{{ $socio->name }}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <input id="lastname1" type="text" style="text-align: center;" placeholder="Apellido Paterno" value="{{ $socio->lastname1 }}" class="form-control @error('lastname1') is-invalid @enderror" name="lastname1" value="{{ old('lastname1') }}" required autocomplete="lastname1" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <input id="lastname2" type="text" style="text-align: center;" placeholder="Apellido Materno" value="{{ $socio->lastname2 }}" class="form-control @error('lastname2') is-invalid @enderror" name="lastname2" value="{{ old('lastname2') }}" required autocomplete="lastname2" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <input id="email" type="email" style="text-align: center;" placeholder="Correo" value="{{ $socio->email }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <input id="password" type="password" style="text-align: center;" placeholder="Contraseña" class="form-control @error('password') is-invalid @enderror" name="password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <select class="form-control" id="tipo" name="tipo" required>
                                <option value="">Seleccione tipo de servicio</option>
                                @foreach($servicios as $pos => $servicio)
                                    <option value="{{ $servicio->id }}" {{ ( $servicio->id == $socio->id_tipo_servicio) ? 'selected' : '' }}>{{ $servicio->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <select class="form-control" id="estatus" name="estatus" required>
                                <option value="">Seleccione tipo de estatus</option>
                                    <option value="Aprobado" {{ ($socio->estatus == "Aprobado") ? 'selected' : '' }}>Aprobado</option>
                                    <option value="Pendiente" {{ ($socio->estatus == "Pendiente") ? 'selected' : '' }}>Pendiente</option>
                                    <option value="Rechazado" {{ ($socio->estatus == "Rechazado") ? 'selected' : '' }}>Rechazado</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            {{ method_field('PUT') }}
                            <button type="submit" class="btn btn-lg" style="background-color: #87d1e6">
                                {{ __('Actualizar') }}
                            </button>
                        </div>
                    </div>
                    
                </form>
                
            </div>
        </div>
    </div>
</div>