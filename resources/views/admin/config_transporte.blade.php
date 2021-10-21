@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1></h1>
@stop

@section('content')

<div class="row">

    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header with-border">
              <h3 class="card-title">Percepciones Economicas</h3>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-4">
                    
                    Tipo de Socio
                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                    <option selected="selected" data-select2-id="3">Alabama</option>
                    <option data-select2-id="16">Alaska</option>
                    <option data-select2-id="17">California</option>
                    <option data-select2-id="18">Delaware</option>
                    <option data-select2-id="19">Tennessee</option>
                    <option data-select2-id="20">Texas</option>
                    <option data-select2-id="21">Washington</option>
                    </select>
                
                </div>
                <div class="col-md-2">
                    Comisión Petride
                  <input type="text" class="form-control" placeholder=".col-xs-3">
                </div>
                <div class="col-md-2">
                    Costo de Ruta
                  <input type="text" class="form-control" placeholder=".col-xs-4">
                </div>
                <div class="col-md-2">
                    Ganancia de Ruta
                  <input type="text" class="form-control" placeholder=".col-xs-5">
                </div>
              </div>
            </div>
            <!-- /.box-body -->
            </div>
    </div>
    
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header with-border">
              <h3 class="card-title">Desglose de Costos</h3>
            </div>
            <div class="card-body">
              <div class="row">
                
                <div class="col-md-6">
                    Costo por km/m
                  <input type="text" class="form-control" placeholder=".col-xs-3">
                </div>
                <div class="col-md-6">
                    Costo por Cancelación
                  <input type="text" class="form-control" placeholder=".col-xs-4">
                </div>
                <div class="col-md-6">
                    Tarifa minima por servicio Rider
                  <input type="text" class="form-control" placeholder=".col-xs-5">
                </div>
                <div class="col-md-6">
                    Costo de Cancelacion Pet Rider
                  <input type="text" class="form-control" placeholder=".col-xs-5">
                </div>
                <div class="col-md-6">
                    Tarifa minima de servicio Cancelado
                  <input type="text" class="form-control" placeholder=".col-xs-5">
                </div>
                <div class="col-md-6">
                    Precio por Kilometro Hora Pico
                  <input type="text" class="form-control" placeholder=".col-xs-5">
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 align-self-center align-items-center d-flex justify-content-center">
                    Precio por Kilometro Hora No Pico
                </div>
                <div class="col-md-2 align-self-center align-items-center d-flex justify-content-center">
                  <input type="text" class="form-control" placeholder=".col-xs-2">
                </div>
              </div>
            </div>
            <!-- /.box-body -->
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
