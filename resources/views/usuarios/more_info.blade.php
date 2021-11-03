@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Mas información</h1>
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
            <h3 class="card-title">Usuario</h3>
        </div>

        <div class="card-body">

                <div class="box box-primary">
                    <form id="myForm" name="myForm" method="POST" action="{{ route('complementos.update', $user_info[0]->id) }}">
                        @csrf
                        
                        <div class="col-md-12">
                            <div class="box-body">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Fecha de Nacimiento</label>
                                        <input type="text" id="FechaNacimiento" name="FechaNacimiento" value="{{ !empty($user_info[0]->FechaNacimiento) ?  $user_info[0]->FechaNacimiento : "" }}" class="form-control" placeholder="Datos...">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputtext1">Sexo</label>
                                        <input type="text" id="Sexo" name="Sexo" class="form-control" value="{{ !empty($user_info[0]->Sexo) ?  $user_info[0]->Sexo : "" }}" placeholder="Datos...">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputtext1">Domicilio</label>
                                        <input type="text" id="Domicilio" name="Domicilio" value="{{ !empty($user_info[0]->Domicilio) ?  $user_info[0]->Domicilio : "" }}" class="form-control" placeholder="Datos...">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputtext1">Colonia</label>
                                        <input type="text" id="Colonia" name="Colonia" value="{{ !empty($user_info[0]->Colonia) ?  $user_info[0]->Colonia : "" }}" class="form-control" placeholder="Datos...">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputtext1">Codigo Postal</label>
                                        <input type="text" id="CodigoPostal" name="CodigoPostal" value="{{ !empty($user_info[0]->CodigoPostal) ?  $user_info[0]->CodigoPostal : "" }}" class="form-control" placeholder="Datos...">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputtext1">Estado</label>
                                        <input type="text" id="Estado" name="Estado" value="{{ !empty($user_info[0]->Estado) ?  $user_info[0]->Estado : "" }}" class="form-control" placeholder="Datos...">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputtext1">Celular</label>
                                        <input type="text" id="Celular" name="Celular" value="{{ !empty($user_info[0]->Celular) ?  $user_info[0]->Celular : "" }}" class="form-control" placeholder="Datos...">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputtext1">Estado Civil</label>
                                        <input type="text" id="EstadoCivil" name="EstadoCivil" value="{{ !empty($user_info[0]->EstadoCivil) ?  $user_info[0]->EstadoCivil : "" }}" class="form-control" placeholder="Datos...">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputtext1">Nivel de Estudios</label>
                                        <input type="text" id="NivelEstudios" name="NivelEstudios" value="{{ !empty($user_info[0]->NivelEstudios) ?  $user_info[0]->NivelEstudios : "" }}" class="form-control" placeholder="Datos...">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputtext1">Fecha de Nacimiento</label>
                                        <input type="text" id="SituacionLaboral" name="SituacionLaboral" value="{{ !empty($user_info[0]->SituacionLaboral) ?  $user_info[0]->SituacionLaboral : "" }}" class="form-control" placeholder="Datos...">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputtext1">Foto de Identificacion</label>
                                        <input type="text" id="FotoIdentificacion" name="FotoIdentificacion" value="{{ !empty($user_info[0]->FotoIdentificacion) ?  $user_info[0]->FotoIdentificacion : "" }}" class="form-control" placeholder="Datos...">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputtext1">Foto de Seguro Cobertura</label>
                                        <input type="text" id="FotoSeguroCobertura" name="FotoSeguroCobertura" value="{{ !empty($user_info[0]->FotoSeguroCobertura) ?  $user_info[0]->FotoSeguroCobertura : "" }}" class="form-control" placeholder="Datos...">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputtext1">Foto de ConstanciaFiscal</label>
                                        <input type="text" id="FotoConstanciaFiscal" name="FotoConstanciaFiscal" value="{{ !empty($user_info[0]->FotoConstanciaFiscal) ?  $user_info[0]->FotoConstanciaFiscal : "" }}" class="form-control" placeholder="Datos...">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputtext1">Foto de Perfil</label>
                                        <input type="text" id="FotoPerfil" name="FotoPerfil" value="{{ !empty($user_info[0]->FotoPerfil) ?  $user_info[0]->FotoPerfil : "" }}" class="form-control"  placeholder="Datos...">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputtext1">NoCuenta</label>
                                        <input type="text" id="NoCuenta" name="NoCuenta" value="{{ !empty($user_info[0]->NoCuenta) ?  $user_info[0]->NoCuenta : "" }}" class="form-control" placeholder="Datos...">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputtext1">CLABE</label>
                                        <input type="text" id="CLABE" name="CLABE" value="{{ !empty($user_info[0]->CLABE) ?  $user_info[0]->CLABE : "" }}" class="form-control" placeholder="Datos...">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputtext1">CER</label>
                                        <input type="text" id="CER" name="CER" value="{{ !empty($user_info[0]->CER) ?  $user_info[0]->CER : "" }}" class="form-control" placeholder="Datos...">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputtext1">KEY</label>
                                        <input type="text" id="KEY" name="KEY" value="{{ !empty($user_info[0]->KEY) ?  $user_info[0]->KEY : "" }}" class="form-control" placeholder="Datos...">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputtext1">Password</label>
                                        <input type="text" id="Password" name="Password" value="{{ !empty($user_info[0]->Password) ?  $user_info[0]->Password : "" }}" class="form-control" placeholder="Datos...">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputtext1">Tipo de Automovil</label>
                                        <input type="text" id="TipoAutomovil" name="TipoAutomovil" value="{{ !empty($user_info[0]->TipoAutomovil) ?  $user_info[0]->TipoAutomovil : "" }}" class="form-control" placeholder="Datos...">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputtext1">Placas</label>
                                        <input type="text" id="Placas" name="Placas" value="{{ !empty($user_info[0]->Placas) ?  $user_info[0]->Placas : "" }}" class="form-control" placeholder="Datos...">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputtext1">Color de Automovil</label>
                                        <input type="text" id="ColorAutomovil" name="ColorAutomovil" value="{{ !empty($user_info[0]->ColorAutomovil) ?  $user_info[0]->ColorAutomovil : "" }}" class="form-control" placeholder="Datos...">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputtext1">Poliza de Seguro</label>
                                        <input type="text" id="PolizaSeguro" name="PolizaSeguro" value="{{ !empty($user_info[0]->PolizaSeguro) ?  $user_info[0]->PolizaSeguro : "" }}" class="form-control" placeholder="Datos...">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputtext1">Vigencia de Seguro</label>
                                        <input type="text" id="VigenciaSeguro" name="VigenciaSeguro" value="{{ !empty($user_info[0]->VigenciaSeguro) ?  $user_info[0]->VigenciaSeguro : "" }}" class="form-control" placeholder="Datos...">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputtext1">Licencia de Conducir</label>
                                        <input type="text" id="LicenciaConducir" name="LicenciaConducir" value="{{ !empty($user_info[0]->LicenciaConducir) ?  $user_info[0]->LicenciaConducir : "" }}" class="form-control" placeholder="Datos...">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputtext1">Vigencia Licencia</label>
                                        <input type="text" id="VigenciaLicencia" name="VigenciaLicencia" value="{{ !empty($user_info[0]->VigenciaLicencia) ?  $user_info[0]->VigenciaLicencia : "" }}" class="form-control" placeholder="Datos...">
                                    </div>

                                </div>                                
                            </div>

                            <div class="box-footer">
                                {{ method_field('PUT') }}
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-sync-alt"></i> Actualizar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            
        </div>
    </div>
    
@stop

@section('css')
    <!--<link rel="stylesheet" href="/css/admin_custom.css">-->
@stop

@section('js')
    <script type="text/javascript">
        
    </script>

@stop
