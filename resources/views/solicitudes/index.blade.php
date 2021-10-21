@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Solicitudes</h1>
@stop

@section('content')
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Nuevas Peticiones</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-striped table-bordered dt-responsive" id="tableSolicitudes">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Nombre de Usuario</th>
                      <th>Tipo de Servicio</th>
                      <th>Pendiente</th>
                      <th style="width: 40px">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($solicitudes as $pos => $solicitud)
                    <tr>
                      <td>{{ $solicitud->id }}</td>
                      <td>{{ $solicitud->name }} {{ $solicitud->lastname1 }} {{ $solicitud->lastname2 }}</td>
                      <td>{{ $solicitud->tipo_servicio }}</td>
                      <td>{{ $solicitud->estatus }} </td>
                      {{--  we will also add show, edit, and delete buttons  --}}
                      <td>
                      <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                      <i class="fas fa-edit"></i>
                      </button>
                        
                        <a class="btn btn-small btn-danger"><i class="fas fa-trash-alt"></i></a>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            
            
            <div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Default Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    
                  <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Lastname1') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('lastname1') is-invalid @enderror" name="lastname1" value="{{ old('lastname1') }}" required autocomplete="lastname1" autofocus>

                                @error('lastname1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Lastname2') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('lastname2') is-invalid @enderror" name="lastname2" value="{{ old('lastname2') }}" required autocomplete="lastname2" autofocus>

                                @error('lastname2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>

                  </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
@stop

@section('css')
    <!--<link rel="stylesheet" href="/css/admin_custom.css">-->
@stop

@section('js')


<script type="text/javascript">
	$('#tableSolicitudes').DataTable({
    "aoColumnDefs": [
            { "sWidth": "80px", "aTargets": [4] },
    ],
		language: {
		 		"sProcessing":     "Procesando...",
                             "sLengthMenu":     "Mostrar _MENU_ registros",
                             "sZeroRecords":    "No se encontraron resultados",
                             "sEmptyTable":     "Ningún dato disponible en esta tabla",
                             "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                             "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                             "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                             "sInfoPostFix":    "",
                             "sSearch":         "Buscar:",
                             "sUrl":            "",
                             "sInfoThousands":  ",",
                             "sLoadingRecords": "Cargando...",
                             "oPaginate": {
                                 "sFirst":    "Primero",
                                 "sLast":     "Último",
                                 "sNext":     "Siguiente",
                                 "sPrevious": "Anterior"
                             },
                             "oAria": {
                                 "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                                 "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                             }
        }
   	});
</script>

@stop
