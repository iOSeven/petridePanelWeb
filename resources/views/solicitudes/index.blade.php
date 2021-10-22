@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Solicitudes</h1>
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
                      <button type="button" id="btnmodal" class="btn btn-success" 
                              data-toggle="modal" 
                              data-target="#modal-default" 
                              data-idsolicitud="{{ $solicitud->id }}"
                              data-name="{{ $solicitud->name }}"
                              data-lastname1="{{ $solicitud->lastname1 }}"
                              data-lastname2="{{ $solicitud->lastname2 }}"
                              data-email="{{ $solicitud->email }}"
                              data-tipo="{{ $solicitud->id_tipo_servicio }}"
                              data-estatus="{{ $solicitud->estatus }}"
                      >
                      <i class="fas fa-edit"></i>
                      </button>
                      
                      <form action="{{ route('solicitudes.destroy', $solicitud->id) }}" method="POST">
                        @csrf
                        @method("DELETE")
                          <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash-alt"></i>
                          </button>
                      </form>

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
                    <h4 class="modal-title">SOLICITID No. <label id="numero" name="numero"></label></h4>
                    <button type="button" class="close bg-red" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    
                  <form id="myForm" name="myForm" method="POST" action="{{ route('solicitudes.update', 'SOL_ID') }}">
                        @csrf

                        <div class="form-group row" style="display:none">
                            <label for="idSolicitud" class="col-md-4 col-form-label text-md-right">{{ __('ID') }}</label>

                            <div class="col-md-6">
                                <input id="idSolicitud" type="text" class="form-control @error('idSolicitud') is-invalid @enderror" name="idSolicitud" value="{{ old('idSolicitud') }}" required autocomplete="idSolicitud" autofocus>

                                @error('idSolicitud')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

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
                                <input id="lastname1" type="text" class="form-control @error('lastname1') is-invalid @enderror" name="lastname1" value="{{ old('lastname1') }}" required autocomplete="lastname1" autofocus>

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
                                <input id="lastname2" type="text" class="form-control @error('lastname2') is-invalid @enderror" name="lastname2" value="{{ old('lastname2') }}" required autocomplete="lastname2" autofocus>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                          <label for="tipo" class="col-md-4 col-form-label text-md-right">{{ __('Tipo') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" id="tipo" name="tipo" required>
                                    <option value="">Seleccione tipo de servicio</option>
                                    @foreach($servicios as $pos => $servicio)
                                        <option value="{{ $servicio->id }}">{{ $servicio->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                          <label for="estatus" class="col-md-4 col-form-label text-md-right">{{ __('Estatus') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" id="estatus" name="estatus" required>
                                    <option value="">Seleccione tipo de estatus</option>
                                      <option value="Aprobado">Aprobado</option>
                                      <option value="Pendiente">Pendiente</option>
                                      <option value="Rechazado">Rechazado</option>
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

<script>
  $(document).ready(function() {
       $("#btnmodal").click(function() {
         var id = $(this).data('idsolicitud');
         var nombre = $(this).data('name');
         var lastname1 = $(this).data('lastname1');
         var lastname2 = $(this).data('lastname2');
         var email = $(this).data('email');
         var tipo = $(this).data('tipo');
         var estatus = $(this).data('estatus');

         $("#numero").text(id);
         $("#idSolicitud").val(id);
         $("#name").val(nombre);
         $("#lastname1").val(lastname1);
         $("#lastname2").val(lastname2);
         $("#email").val(email);
         $('#tipo > option[value="'+tipo+'"]').attr('selected', 'selected');
         $('#estatus > option[value="'+estatus+'"]').attr('selected', 'selected');
       });
  });

  window.setTimeout(function() {
      $(".alert-message").fadeTo(500, 0).slideUp(500, function(){
          $(this).remove(); 
      });
  }, 5000);
</script>

@stop
