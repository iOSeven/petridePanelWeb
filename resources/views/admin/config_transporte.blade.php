@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Configuración de Transporte</h1>
@stop

@section('content')

    <div class="row">

        <div class="col-md-12">
            <div class="card" style="border-radius: 20px">
                <div class="card-header with-border" style="color: #000; background-color: #ffd040; border-top-right-radius:20px; border-top-left-radius:20px">
                    <h3 class="card-title">Percepciones Económicas</h3>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <option selected="selected" data-select2-id="3">Tipo de Socio</option>
                                <option data-select2-id="3">Alabama</option>
                                <option data-select2-id="16">Alaska</option>
                                <option data-select2-id="17">California</option>
                                <option data-select2-id="18">Delaware</option>
                                <option data-select2-id="19">Tennessee</option>
                                <option data-select2-id="20">Texas</option>
                                <option data-select2-id="21">Washington</option>
                            </select>
                        </div>

                        <div class="col-md-2">
                            <input type="text" class="form-control" placeholder="Comisión Petride">
                        </div>
                        
                        <div class="col-md-2">
                            <input type="text" class="form-control" placeholder="Costo de Ruta">
                        </div>
                        
                        <div class="col-md-2">
                            <input type="text" class="form-control" placeholder="Ganancia de Ruta">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card" style="border-radius: 20px">
                <div class="card-header with-border" style="color: #000; background-color: #ffd040; border-top-right-radius:20px; border-top-left-radius:20px">
                    <h3 class="card-title">Desglose de Costos</h3>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Costo por km/m">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Costo por Cancelación">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Tarifa minima por servicio Rider">
                        </div>

                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Costo de Cancelacion Pet Rider">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Tarifa minima de servicio Cancelado">
                        </div>

                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Precio por Kilometro Hora Pico">
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-md-6 align-self-center align-items-center d-flex justify-content-center">
                            <input type="text" class="form-control" placeholder="Precio por Kilometro Hora No Pico">
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>
    </div>

@stop

@section('css')
    <!--<link rel="stylesheet" href="/css/admin_custom.css">-->
@stop

@section('js')
    <!--<script> console.log('Hi!'); </script>-->
@stop
