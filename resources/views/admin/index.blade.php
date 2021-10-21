@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1></h1>
@stop

@section('content')

<div class="card">
    <div class="card-header align-self-center">
        <a class="btn btn-app">
            <span class="badge bg-red">12</span>
            <i class="fa fa-cog"></i> Administración
        </a>
    </div>

    <div class="card-body align-items-center d-flex justify-content-center">
        <img src="http://localhost:8000/img/logo.png" style="width: 35%; height: 35%" alt="">
    </div>
</div>

@stop

@section('css')
    <!--<link rel="stylesheet" href="/css/admin_custom.css">-->
@stop

@section('js')
    <!--<script> console.log('Hi!'); </script>-->
@stop
