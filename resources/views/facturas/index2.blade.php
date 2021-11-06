@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Facturación</h1>
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
            <h3 class="card-title">Facturas</h3>
        </div>

        <div class="card-body">
            <table class="table table-striped table-bordered dt-responsive" id="tableFacturas">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th style="width: 40px">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($facturas as $pos => $factura)
                        <tr>
                            <td>{{ $factura->id }}</td>
                            <td>
                                <button type="button" id="btnmodal" class="btn btn-success" data-toggle="modal" data-target="#modal-default{{ $factura->id }}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button type="button" id="btnmodal" class="btn btn-danger" data-toggle="modal" data-target="#deleteConfirmation{{ $factura->id }}">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>

                        <!-- @include('solicitudes.modals.delete')
                        @include('solicitudes.modals.edit') -->

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
        $('#tableFacturas').DataTable({
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
