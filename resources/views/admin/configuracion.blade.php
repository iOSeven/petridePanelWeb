@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Panel de Configuración</h1>
@stop

@section('content')

<div class="row">
    <div class="col-md-3">
        <a href="{{ asset('/admin/config/transporte') }}" style="color: #fff;">
            <div class="card" 
                style="background-image: url('../img/config/transporte.jpg'); background-size: cover; align-items: center; height: 100%">
                <div class="card-body" style="display: flex; justify-content: center; align-items: flex-end">
                    <div>
                        <h2>TRANSPORTE</h2>
                    </div>
                </div>
            </div>
        </a>
    </div>
    
    <div class="col-md-3">
        <a href="#" style="color: #fff;">
            <div class="card" 
                style="background-image: url('../img/config/paseo.jpg'); background-size: cover; align-items: center; height: 100%">
                <div class="card-body" style="display: flex; justify-content: center; align-items: flex-end">
                    <div>
                        <h2>PASEO</h2>
                    </div>
                </div>  
            </div>
        </a>
    </div>

    <div class="col-md-3">
        <a href="#" style="color: #fff;">
            <div class="card" 
                style="background-image: url('../img/config/hospedaje.jpg'); background-size: cover; align-items: center; height: 100%">
                <div class="card-body" style="display: flex; justify-content: center; align-items: flex-end">
                    <div>
                        <h2>HOSPEDAJE</h2>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-3" style="height:200px">
        <a href="#" style="color: #fff;">
            <div class="card" 
                style="background-image: url('../img/config/entrenamiento.jpg'); background-size: cover; align-items: center; height: 100%">
                <div class="card-body" style="display: flex; justify-content: center; align-items: flex-end">
                    <div>
                        <h2>ENTRENAMIENTO</h2>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>

<div class="row" style="margin-top: 15px;">
    <div class="col-md-3">
        <a href="#" style="color: #fff;">
            <div class="card" 
                style="background-image: url('../img/config/veterinaria.jpg'); background-size: cover; align-items: center; height: 100%">
                <div class="card-body" style="display: flex; justify-content: center; align-items: flex-end">
                    <div>
                        <h2>ATENCIÓN MÉDICA</h2>
                    </div>
                </div>
            </div>
        </a>
    </div>
    
    <div class="col-md-3">
        <a href="#" style="color: #fff;">
            <div class="card" 
                style="background-image: url('../img/config/estetica.jpg'); background-size: cover; align-items: center; height: 100%">
                <div class="card-body" style="display: flex; justify-content: center; align-items: flex-end">
                    <div>
                        <h2>ATENCIÓN ESTÉTICA</h2>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-3">
        <a href="#" style="color: #fff;">
            <div class="card" 
                style="background-image: url('../img/config/denuncia.jpg'); background-size: cover; align-items: center; height: 100%">
                <div class="card-body" style="display: flex; justify-content: center; align-items: flex-end">
                    <div>
                        <h2>DENUNCIA</h2>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-3" style="height: 200px">
        <a href="#" style="color: #fff;">
            <div class="card" 
                style="background-image: url('../img/config/rescate.jpg'); background-size: cover; align-items: center; height: 100%">
                <div class="card-body" style="display: flex; justify-content: center; align-items: flex-end">
                    <div>
                        <h2>RESCATE</h2>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>

<div class="row" style="margin-top: 15px;">
    <div class="col-md-3">
        <a href="#" style="color: #fff;">
            <div class="card" 
                style="background-image: url('../img/config/adopcion.jpg'); background-size: cover; align-items: center; height: 100%">
                <div class="card-body" style="display: flex; justify-content: center; align-items: flex-end">
                    <div>
                        <h2>ADOPCIÓN</h2>
                    </div>
                </div>
            </div>
        </a>
    </div>
    
    <div class="col-md-3">
        <a href="#" style="color: #fff;">
            <div class="card" 
                style="background-image: url('../img/config/tienda.jpg'); background-size: cover; align-items: center; height: 100%">
                <div class="card-body" style="display: flex; justify-content: center; align-items: flex-end">
                    <div>
                        <h2>TIENDA</h2>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-3">
        <a href="#" style="color: #fff;">
            <div class="card" 
                style="background-image: url('../img/config/blog.jpg'); background-size: cover; align-items: center; height: 100%">
                <div class="card-body" style="display: flex; justify-content: center; align-items: flex-end">
                    <div>
                        <h2>BLOG</h2>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-3" style="height: 200px">
        <a href="#" style="color: #fff;">
            <div class="card" 
                style="background-image: url('../img/config/facturacion.jpg'); background-size: cover; align-items: center; height: 100%">
                <div class="card-body" style="display: flex; justify-content: center; align-items: flex-end">
                    <div>
                        <h2>FACTURACIÓN</h2>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>

@stop

@section('css')
    <!--<link rel="stylesheet" href="/css/admin_custom.css">-->
@stop

@section('js')
    <!--<script> console.log('Hi!'); </script>-->
@stop
