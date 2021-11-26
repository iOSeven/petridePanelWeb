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

    <div class="card" style="border-radius: 20px">
        <div class="card-header" style="color: #000; background-color: #ffd040; border-top-right-radius:20px; border-top-left-radius:20px">
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
                                    <input type="text" placeholder="Fecha de Nacimiento" id="FechaNacimiento" name="FechaNacimiento" value="{{ !empty($user_info[0]->FechaNacimiento) ?  $user_info[0]->FechaNacimiento : "" }}" class="form-control" />
                                </div>

                                <div class="form-group col-md-4">
                                    <input type="text" placeholder="Sexo" id="Sexo" name="Sexo" class="form-control" value="{{ !empty($user_info[0]->Sexo) ?  $user_info[0]->Sexo : "" }}" />
                                </div>

                                <div class="form-group col-md-4">
                                    <input type="text" placeholder="Domicilio" id="Domicilio" name="Domicilio" value="{{ !empty($user_info[0]->Domicilio) ?  $user_info[0]->Domicilio : "" }}" class="form-control" />
                                </div>

                                <div class="form-group col-md-4">
                                    <input type="text" placeholder="Colonia" id="Colonia" name="Colonia" value="{{ !empty($user_info[0]->Colonia) ?  $user_info[0]->Colonia : "" }}" class="form-control" />
                                </div>

                                <div class="form-group col-md-4">
                                    <input type="text" placeholder="Código Postal" id="CodigoPostal" name="CodigoPostal" value="{{ !empty($user_info[0]->CodigoPostal) ?  $user_info[0]->CodigoPostal : "" }}" class="form-control" />
                                </div>

                                <div class="form-group col-md-4">
                                    <input type="text" placeholder="Estado" id="Estado" name="Estado" value="{{ !empty($user_info[0]->Estado) ?  $user_info[0]->Estado : "" }}" class="form-control" />
                                </div>

                                <div class="form-group col-md-4">
                                    <input type="text" placeholder="Celular" id="Celular" name="Celular" value="{{ !empty($user_info[0]->Celular) ?  $user_info[0]->Celular : "" }}" class="form-control" />
                                </div>

                                <div class="form-group col-md-4">
                                    <input type="text" placeholder="Estado Civil" id="EstadoCivil" name="EstadoCivil" value="{{ !empty($user_info[0]->EstadoCivil) ?  $user_info[0]->EstadoCivil : "" }}" class="form-control" />
                                </div>

                                <div class="form-group col-md-4">
                                    <input type="text" placeholder="Nivel de Estudios" id="NivelEstudios" name="NivelEstudios" value="{{ !empty($user_info[0]->NivelEstudios) ?  $user_info[0]->NivelEstudios : "" }}" class="form-control" />
                                </div>

                                <div class="form-group col-md-4">
                                    <input type="text" placeholder="Situación Laboral" id="SituacionLaboral" name="SituacionLaboral" value="{{ !empty($user_info[0]->SituacionLaboral) ?  $user_info[0]->SituacionLaboral : "" }}" class="form-control" />
                                </div>

                                <div class="form-group col-md-4">
                                    <input type="text" placeholder="Foto de Identificacion" id="FotoIdentificacion" name="FotoIdentificacion" value="{{ !empty($user_info[0]->FotoIdentificacion) ?  $user_info[0]->FotoIdentificacion : "" }}" class="form-control" />
                                </div>

                                <div class="form-group col-md-4">
                                    <input type="text" placeholder="Foto de Seguro Cobertura" id="FotoSeguroCobertura" name="FotoSeguroCobertura" value="{{ !empty($user_info[0]->FotoSeguroCobertura) ?  $user_info[0]->FotoSeguroCobertura : "" }}" class="form-control" />
                                </div>

                                <div class="form-group col-md-4">
                                    <input type="text" placeholder="Foto de ConstanciaFiscal" id="FotoConstanciaFiscal" name="FotoConstanciaFiscal" value="{{ !empty($user_info[0]->FotoConstanciaFiscal) ?  $user_info[0]->FotoConstanciaFiscal : "" }}" class="form-control" />
                                </div>

                                <div class="form-group col-md-4">
                                    <input type="text" placeholder="Foto de Perfil" id="FotoPerfil" name="FotoPerfil" value="{{ !empty($user_info[0]->FotoPerfil) ?  $user_info[0]->FotoPerfil : "" }}" class="form-control"  />
                                </div>

                                <div class="form-group col-md-4">
                                    <input type="text" placeholder="No. Cuenta" id="NoCuenta" name="NoCuenta" value="{{ !empty($user_info[0]->NoCuenta) ?  $user_info[0]->NoCuenta : "" }}" class="form-control" />
                                </div>

                                <div class="form-group col-md-4">
                                    <input type="text" placeholder="CLABE" id="CLABE" name="CLABE" value="{{ !empty($user_info[0]->CLABE) ?  $user_info[0]->CLABE : "" }}" class="form-control" />
                                </div>

                                <div class="form-group col-md-4">
                                    <input type="text" placeholder="CER" id="CER" name="CER" value="{{ !empty($user_info[0]->CER) ?  $user_info[0]->CER : "" }}" class="form-control" />
                                </div>

                                <div class="form-group col-md-4">
                                    <input type="text" placeholder="KEY" id="KEY" name="KEY" value="{{ !empty($user_info[0]->KEY) ?  $user_info[0]->KEY : "" }}" class="form-control" />
                                </div>

                                <div class="form-group col-md-4">
                                    <input type="text" placeholder="Password" id="Password" name="Password" value="{{ !empty($user_info[0]->Password) ?  $user_info[0]->Password : "" }}" class="form-control" />
                                </div>

                                <div class="form-group col-md-4">
                                    <input type="text" placeholder="Típo de Automóvil" id="TipoAutomovil" name="TipoAutomovil" value="{{ !empty($user_info[0]->TipoAutomovil) ?  $user_info[0]->TipoAutomovil : "" }}" class="form-control" />
                                </div>

                                <div class="form-group col-md-4">
                                    <input type="text" placeholder="Placas" id="Placas" name="Placas" value="{{ !empty($user_info[0]->Placas) ?  $user_info[0]->Placas : "" }}" class="form-control" />
                                </div>

                                <div class="form-group col-md-4">
                                    <input type="text" placeholder="Color de Automóvil" id="ColorAutomovil" name="ColorAutomovil" value="{{ !empty($user_info[0]->ColorAutomovil) ?  $user_info[0]->ColorAutomovil : "" }}" class="form-control" />
                                </div>

                                <div class="form-group col-md-4">
                                    <input type="text" placeholder="Póliza de Seguro" id="PolizaSeguro" name="PolizaSeguro" value="{{ !empty($user_info[0]->PolizaSeguro) ?  $user_info[0]->PolizaSeguro : "" }}" class="form-control" />
                                </div>

                                <div class="form-group col-md-4">
                                    <input type="text" placeholder="Vigencia de Seguro" id="VigenciaSeguro" name="VigenciaSeguro" value="{{ !empty($user_info[0]->VigenciaSeguro) ?  $user_info[0]->VigenciaSeguro : "" }}" class="form-control" />
                                </div>

                                <div class="form-group col-md-4">
                                    <input type="text" placeholder="Licencia de Conducir" id="LicenciaConducir" name="LicenciaConducir" value="{{ !empty($user_info[0]->LicenciaConducir) ?  $user_info[0]->LicenciaConducir : "" }}" class="form-control" />
                                </div>

                                <div class="form-group col-md-4">
                                    <input type="text" placeholder="Vigencia Licencia" id="VigenciaLicencia" name="VigenciaLicencia" value="{{ !empty($user_info[0]->VigenciaLicencia) ?  $user_info[0]->VigenciaLicencia : "" }}" class="form-control" />
                                </div>

                                <div class="form-group col-md-4">
                                    {{ method_field('PUT') }}
                                    <button type="submit" class="btn btn-block" style="background-color: #87d1e6">
                                        <i class="fas fa-sync-alt"></i> Actualizar
                                    </button>
                                </div>

                            </div>                                
                        </div>
                    </div>
                </form>
            </div>

            
        </div>
    </div>
    
    <div class="card" style="border-radius: 20px">
        <div class="card-header" style="color: #000; background-color: #ffd040; border-top-right-radius:20px; border-top-left-radius:20px">
            <h3 class="card-title">Transportadora</h3>
        </div>

        <div class="card-body">

            <div class="box box-primary">
                <form id="myForm" name="myForm" method="POST" action="{{ route('complementos.update_transportadora', $user_transportadora[0]->id) }}">
                    @csrf
                    
                    <div class="col-md-12">
                        <div class="box-body">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <select id="TipoTransportadora" name="TipoTransportadora" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option value="0" >Tipo de Transportadora</option>
                                        <option value="Chica-Domestico" {{ $user_transportadora[0]->TipoTransportadora === 'Chica-Domestico' ?  "selected = 'selected'": "" }}>Chica-Domestico</option>
                                        <option value="Chica-Crianza" {{ $user_transportadora[0]->TipoTransportadora === 'Chica-Crianza' ?  "selected = 'selected'": "" }}>Chica-Crianza</option>
                                        <option value="Mediana-Domestico" {{ $user_transportadora[0]->TipoTransportadora === 'Mediana-Domestico' ?  "selected = 'selected'": "" }}>Mediana-Domestico</option>
                                        <option value="Mediana-Crianza" {{ $user_transportadora[0]->TipoTransportadora === 'Mediana-Crianza' ?  "selected = 'selected'": "" }}>Mediana-Crianza</option>
                                        <option value="Grande-Domestico" {{ $user_transportadora[0]->TipoTransportadora === 'Grande-Domestico' ?  "selected = 'selected'": "" }}>Grande-Domestico</option>
                                        <option value="Grande-Crianza" {{ $user_transportadora[0]->TipoTransportadora === 'Grande-Crianza' ?  "selected = 'selected'": "" }}>Grande-Crianza</option>
                                    </select>
                                    
                                </div>

                                <div class="form-group col-md-4">
                                    <input type="text" placeholder="Placas de Transportadora" id="PlacasTransportadora" name="PlacasTransportadora" class="form-control" value="{{ !empty($user_transportadora[0]->PlacasTransportadora) ?  $user_transportadora[0]->PlacasTransportadora : "" }}" />
                                </div>

                                <div class="form-group col-md-4">
                                    {{ method_field('PUT') }}
                                    <button type="submit" class="btn btn-block" style="background-color: #87d1e6">
                                        <i class="fas fa-sync-alt"></i> Actualizar
                                    </button>
                                </div>

                            </div>                                
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
