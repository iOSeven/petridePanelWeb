@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Usuarios</h1>
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
            <h3 class="card-title">Usuarios Socios</h3>
        </div>
        
        <div class="card-body">
            <table class="table table-striped table-bordered dt-responsive" id="tableSocios">
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
                    @foreach($socios as $pos => $socio)
                        <tr>
                            <td>{{ $socio->id }}</td>
                            <td>{{ $socio->name }} {{ $socio->lastname1 }} {{ $socio->lastname2 }}</td>
                            <td>{{ $socio->tipo_servicio }}</td>
                            <td>{{ $socio->estatus }} </td>
                            <td>
                                <button type="button" id="btnmodal" class="btn btn-success" data-toggle="modal" data-target="#modal-default{{ $socio->id }}">
                                    <i class="fas fa-edit"></i>
                                </button>

                                <button type="button" id="btnmodal" class="btn btn-danger" data-toggle="modal" data-target="#deleteConfirmationAprobado{{ $socio->id }}">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>

                        @include('usuarios.modals.delete')
                        @include('usuarios.modals.edit')

                    @endforeach
                </tbody>

            </table>
        </div>
    </div>



    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Usuarios del Sistema</h3>
        </div>

        <div class="card-body">
            <table class="table table-striped table-bordered dt-responsive" id="tableUsuarios">
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
                    @foreach($usuarios as $pos => $usuario)
                        <tr>
                            <td>{{ $usuario->id }}</td>
                            <td>{{ $usuario->name }} {{ $usuario->lastname1 }} {{ $usuario->lastname2 }}</td>
                            <td>{{ $usuario->tipo_servicio }}</td>
                            <td>{{ $usuario->estatus }} </td>
                            <td>
                                <button type="button" id="btnmodal" class="btn btn-success" data-toggle="modal" data-target="#modal-defaultUsuario{{ $usuario->id }}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button type="button" id="btnmodal" class="btn btn-danger" data-toggle="modal" data-target="#deleteConfirmationUsuario{{ $usuario->id }}">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>

                        @include('usuarios.modals.deleteUsuario')
                        @include('usuarios.modals.editUsuario')

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Clientes del Sistema</h3>
        </div>

        <div class="card-body">
            <table class="table table-striped table-bordered dt-responsive" id="tableClientes">
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
                    @foreach($clientes as $pos => $cliente)
                        <tr>
                            <td>{{ $cliente->id }}</td>
                            <td>{{ $cliente->name }} {{ $cliente->lastname1 }} {{ $cliente->lastname2 }}</td>
                            <td>{{ $cliente->tipo_servicio }}</td>
                            <td>{{ $cliente->estatus }} </td>
                            <td>
                                <button type="button" id="btnmodal" class="btn btn-success" data-toggle="modal" data-target="#modal-defaultCliente{{ $cliente->id }}" >
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button type="button" id="btnmodal" class="btn btn-danger" data-toggle="modal" data-target="#deleteConfirmationCliente{{ $cliente->id }}">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>

                      @include('usuarios.modals.deleteCliente')
                      @include('usuarios.modals.editCliente')

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <!--<link rel="stylesheet" href="/css/admin_custom.css">-->
@stop

@section('js')


    <script type="text/javascript">
        $('#tableSocios').DataTable({
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

        $('#tableUsuarios').DataTable({
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

        $('#tableClientes').DataTable({
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
