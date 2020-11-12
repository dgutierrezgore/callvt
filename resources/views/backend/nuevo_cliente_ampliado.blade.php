@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Creación de Cliente
@endsection

@section('contentheader_title')
    Creación de Cliente
@endsection

@section('contentheader_description')
    - Formulario de Registro
@endsection

@section('main-content')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @elseif(session('cuidado'))
        <div class="alert alert-warning">
            {{ session('cuidado') }}
        </div>
    @endif


    <div class="col-sm-9">
        <div id="resp">

        </div>
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#inicio" data-toggle="tab" aria-expanded="true"><i class="fa fa-info"></i>
                        <strong>Resumen</strong></a></li>
                <li class=""><a href="#datos_emp" data-toggle="tab" aria-expanded="false"><i class="fa fa-building"></i>
                        <strong>Datos de la Empresa</strong></a></li>
                <li class=""><a href="#info_legal" data-toggle="tab" aria-expanded="false"><i
                            class="fa fa-info-circle"></i>
                        <strong>Info Representante Legal</strong></a></li>
                <li class=""><a href="#contactos" data-toggle="tab" aria-expanded="false"><i class="fa fa-users"></i>
                        <strong>Contactos</strong></a></li>
                <li class=""><a href="#infocall" data-toggle="tab" aria-expanded="false"><i class="fa fa-phone"></i>
                        <strong>Info CALL</strong></a></li>
                <li class=""><a href="#plan_pago" data-toggle="tab" aria-expanded="false"><i
                            class="fa fa-money"></i> <strong>Plan de Pagos</strong></a></li>
                <li class=""><a href="#otros" data-toggle="tab" aria-expanded="false"><i
                            class="fa fa-spinner"></i> <strong>Otros</strong></a></li>
            </ul>

            <div class="tab-content">

                <div class="tab-pane active" id="inicio">
                    <br> @if($id==1)
                        El Cliente ya existia, pero puede modificar ciertos datos.
                    @else
                        El Cliente ha sido creado exitosamente.
                    @endif
                </div>

                <div class="tab-pane" id="datos_emp">

                    <form class='form-horizontal' action="/GuardarCliente" method="POST" id='formulario_res_ex'
                          enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Fecha Registro</label>
                                <div class="col-sm-2">
                                    <input type="date" class="form-control" id="fecdocint" name="fecdocint"
                                           onchange="eventos_fechas()" readonly>
                                </div>
                                <label for="inputEmail3" class="col-sm-2 control-label">Folio</label>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control" value="" id="foliodocint"
                                           name="foliodocint" readonly>
                                </div>
                                <label for="inputEmail3" class="col-sm-1 control-label">Año</label>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control" min="0" id="anniodocint"
                                           value="{{ date('Y') }}" name="anniodocint" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">RUT Empresa</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" min="0" id="rut_emp"
                                           name="rut_emp" value="{{ $cliente->rutcliente }}" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Razón Social</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" min="0" id="rsoc_emp"
                                           name="rsoc_emp" value="{{ $cliente->razonsoccliente }}" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Giro(s)</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="giro_emp" name="giro_emp" rows="2"
                                              readonly>{{ $cliente->girocliente }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Calle</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" min="0" id="calle_emp"
                                           name="calle_emp" value="{{ $cliente->callecliente }}" readonly>
                                </div>
                                <label for="inputEmail3" class="col-sm-1 control-label">Número</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" min="0" id="num_call_emp"
                                           name="num_call_emp" value="{{ $cliente->numcliente }}" readonly>
                                </div>
                                <label for="inputEmail3" class="col-sm-1 control-label">Block</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" min="0" id="block_call_emp"
                                           name="block_call_emp" value="{{ $cliente->blockcliente }}" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Comuna</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" min="0" id="block_call_emp"
                                           name="block_call_emp" value="{{ $cliente->nombrecomuna }}" readonly>
                                </div>
                                <div class="col-sm-2">
                                    <button type="button" id="" class="btn btn-primary"
                                            onclick=""><i class="fa fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Fono</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" min="0" id="anniodocint"
                                           name="anniodocint" value="{{ $cliente->fonocliente }}" readonly>
                                </div>
                                <label for="inputEmail3" class="col-sm-1 control-label">Sitio Web</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" min="0" id="anniodocint"
                                           name="anniodocint" value="{{ $cliente->sitiowebcliente }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">

                        </div>
                    </form>

                </div>

                <div class="tab-pane" id="info_legal">

                    <form class='form-horizontal' action="/GuardarInfoAdicional" method="POST"
                          enctype="multipart/form-data">
                        <input type="hidden" name="idcli" value="{{ $cliente->idclientes }}">
                        <input type="hidden" name="plancheta" value="1">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-sm-8">
                                </div>

                                <label for="inputEmail3" class="col-sm-1 control-label">Año</label>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control" min="0" id="anniodocint"
                                           value="{{ date('Y') }}" name="anniodocint" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">RUT Rep. Legal</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" min="0" id="rut_rleg_emp"
                                           name="rut_rleg_emp" value="{{ $cliente->rutreplegal }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Paterno</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" min="0" id="paterno_rleg_emp"
                                           name="paterno_rleg_emp" value="{{ $cliente->apaternorlegal }}">
                                </div>
                                <label for="inputEmail3" class="col-sm-1 control-label">Materno</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" min="0" id="materno_rleg_emp"
                                           name="materno_rleg_emp" value="{{ $cliente->amaternorlegal }}">
                                </div>
                                <label for="inputEmail3" class="col-sm-1 control-label">Nombres</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" min="0" id="nombres_rleg_emp"
                                           name="nombres_rleg_emp" value="{{ $cliente->nombresrlegal }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Nacionalidad</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" min="0" id="nacionalidad_rleg_emp"
                                           name="nacionalidad_rleg_emp" value="{{ $cliente->nacionalidadrlegal }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Fono Fijo</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" min="0" id="ffijo_rleg_emp"
                                           name="ffijo_rleg_emp" value="{{ $cliente->ffijorlegal }}">
                                </div>
                                <label for="inputEmail3" class="col-sm-1 control-label">Celular</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" min="0" id="cel_rleg_emp"
                                           name="cel_rleg_emp" value="{{ $cliente->celrlegal }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">eMail 1</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" min="0" id="mail1_rleg_emp"
                                           name="mail1_rleg_emp" value="{{ $cliente->mail1replegal }}">
                                </div>
                                <label for="inputEmail3" class="col-sm-1 control-label">eMail 2</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" min="0" id="mail2_rleg_emp"
                                           name="mail2_rleg_emp" value="{{ $cliente->mail2replegal }}">
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            @if($cliente->estadoreplegal==0)
                                <button type="submit" id="btn-res-ex" class="btn btn-success pull-right"><i
                                        class="fa fa-save"></i> Guardar Info Rep. Legal
                                    Cliente
                                </button>
                            @endif
                        </div>
                    </form>

                </div>

                <div class="tab-pane" id="contactos">

                    <form class='form-horizontal' action="/GuardaContactos" method="POST" id='formulario_res_ex'
                          enctype="multipart/form-data">
                        <input type="hidden" name="tipodocint" value="1">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Fecha Registro</label>
                                <div class="col-sm-2">
                                    <input type="date" class="form-control" id="fecdocint" name="fecdocint"
                                           onchange="eventos_fechas()" readonly>
                                </div>
                                <label for="inputEmail3" class="col-sm-2 control-label">Folio</label>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control" value="" id="foliodocint"
                                           name="foliodocint" readonly>
                                </div>
                                <label for="inputEmail3" class="col-sm-1 control-label">Año</label>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control" min="0" id="anniodocint"
                                           value="{{ date('Y') }}" name="anniodocint" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Anexo</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" min="0" id="anniodocint"
                                           name="anniodocint">
                                </div>

                                <label for="inputEmail3" class="col-sm-1 control-label">Celular</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" min="0" id="anniodocint"
                                           name="anniodocint">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Nombre</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" min="0" id="anniodocint"
                                           name="anniodocint">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">eMail</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" min="0" id="anniodocint"
                                           name="anniodocint">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-2">
                                </div>
                                <div class="col-sm-2">
                                    <button type="button" id="" class="btn btn-primary"
                                            onclick="agregar_d_int();"><i class="fa fa-plus"></i> Agregar otro contacto
                                    </button>
                                </div>
                            </div>

                            <div id="div_macro_1">
                                <div id="cuerpo_1">
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="reset" class="btn btn-default"><i class="fa fa-eraser"></i> Limpiar Formulario
                            </button>
                            <button type="submit" id="btn-res-ex" class="btn btn-success pull-right"><i
                                    class="fa fa-save"></i> Guardar Contactos
                                Cliente
                            </button>
                        </div>
                    </form>

                </div>

                <div class="tab-pane" id="infocall">

                    <form class='form-horizontal' action="/GuardaInfoCall" method="POST" id='formulario_res_ex'
                          enctype="multipart/form-data">
                        <input type="hidden" name="tipodocint" value="1">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Fecha Registro</label>
                                <div class="col-sm-2">
                                    <input type="date" class="form-control" id="fecdocint" name="fecdocint"
                                           onchange="eventos_fechas()" readonly>
                                </div>
                                <label for="inputEmail3" class="col-sm-2 control-label">Folio</label>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control" value="" id="foliodocint"
                                           name="foliodocint" readonly>
                                </div>
                                <label for="inputEmail3" class="col-sm-1 control-label">Año</label>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control" min="0" id="anniodocint"
                                           value="{{ date('Y') }}" name="anniodocint" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Contestación</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="matbitdocint" name="matbitdocint" rows="2"
                                              required
                                              onkeyup="eventos_materias(this)"></textarea>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Fono 1</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" min="0" id="anniodocint"
                                           name="anniodocint">
                                </div>
                                <label for="inputEmail3" class="col-sm-1 control-label">Anexo 1</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" min="0" id="anniodocint"
                                           name="anniodocint">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-2">
                                </div>
                                <div class="col-sm-2">
                                    <button type="button" id="" class="btn btn-primary"
                                            onclick="agregar_d_ext();"><i class="fa fa-plus"></i> Agregar otro Fono
                                    </button>

                                    <button type="button" id="" class="btn btn-primary"
                                            onclick="agregar_d_ext2();"><i class="fa fa-plus"></i> Agregar otro Anexo
                                    </button>
                                </div>
                            </div>

                            <div id="div_macro_2">
                                <div id="cuerpo_2">
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="reset" class="btn btn-default"><i class="fa fa-eraser"></i> Limpiar Formulario
                            </button>
                            <button type="submit" id="btn-res-ex" class="btn btn-success pull-right"><i
                                    class="fa fa-save"></i> Guardar Información CALL
                                Cliente
                            </button>
                        </div>
                    </form>

                </div>

                <div class="tab-pane" id="plan_pago">

                    <form class='form-horizontal' action="/GuardarInfoAdicional" method="POST" id='formulario_res_ex'
                          enctype="multipart/form-data">
                        <input type="hidden" name="idcli" value="{{ $cliente->idclientes }}">
                        <input type="hidden" name="plancheta" value="4">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Plan</label>
                                <div class="col-sm-3">
                                    <select class="form-control" name="idplan">
                                        @foreach($tiposplan as $listado)
                                            <option value="{{ $listado->idplanes }}">{{ $listado->nombreplan }} -
                                                ${{ $listado->valorcicloplan }} </option>
                                        @endforeach
                                    </select>
                                </div>

                                <label for="inputEmail3" class="col-sm-1 control-label">Inicio</label>
                                <div class="col-sm-2">
                                    <input type="date" class="form-control" value="" id="fecinicioplan"
                                           name="fecinicioplan">
                                </div>
                                <label for="inputEmail3" class="col-sm-1 control-label">Término</label>
                                <div class="col-sm-2">
                                    <input type="date" class="form-control" min="0" id="fecfinplan"
                                           value="" name="fecfinplan">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Sistema de Pago</label>
                                <div class="col-sm-3">
                                    <select class="form-control" name="idformapago">
                                        @foreach($sistemapago as $listado)
                                            <option
                                                value="{{ $listado->idsispago }}">{{ $listado->nombresispago }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-1">
                                    <button type="button" id="" class="btn btn-primary"
                                            onclick=""><i class="fa fa-eye"></i>
                                    </button>
                                </div>

                                <label for="inputEmail3" class="col-sm-1 control-label">Titular</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" min="0" id="nomtitular"
                                           value="" name="nomtitular">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Rut Titular</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" min="0" id="ruttitular"
                                           name="ruttitular">
                                </div>
                                <label for="inputEmail3" class="col-sm-1 control-label">Tipo Cta.</label>
                                <div class="col-sm-4">
                                    <select class="form-control" name="idtipocuenta">
                                        @foreach($tipocuenta as $listado)
                                            <option
                                                value="{{ $listado->idtipocuenta }}">{{ $listado->nombretipocuenta }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">N°</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" min="0" id="numxtitular"
                                           name="numxtitular">
                                </div>
                                <label for="inputEmail3" class="col-sm-1 control-label">Banco</label>
                                <div class="col-sm-4">
                                    <select class="form-control" name="idbanco">
                                        @foreach($bancos as $listado)
                                            <option value="{{ $listado->idbanco }}">{{ $listado->nombrebanco }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        @if($cliente->estadoplanpago==0)
                            <div class="box-footer">
                                <button type="reset" class="btn btn-default"><i class="fa fa-eraser"></i> Limpiar
                                    Formulario
                                </button>
                                <button type="submit" id="btn-res-ex" class="btn btn-success pull-right"><i
                                        class="fa fa-save"></i> Guardar Plan de Pago Cliente
                                </button>
                            </div>
                        @endif
                    </form>

                </div>

                <div class="tab-pane" id="otros">

                    <form class='form-horizontal' action="/GuardaOtros" method="POST" id='formulario_res_ex'
                          enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Fecha Registro</label>
                                <div class="col-sm-2">
                                    <input type="date" class="form-control" id="fecdocint" name="fecdocint"
                                           onchange="eventos_fechas()" readonly>
                                </div>
                                <label for="inputEmail3" class="col-sm-2 control-label">Folio</label>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control" value="" id="foliodocint"
                                           name="foliodocint" readonly>
                                </div>
                                <label for="inputEmail3" class="col-sm-1 control-label">Año</label>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control" min="0" id="anniodocint"
                                           value="{{ date('Y') }}" name="anniodocint" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Observaciones</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="matbitdocint" name="matbitdocint" rows="4"
                                              required
                                              onkeyup="eventos_materias(this)"></textarea>
                                </div>

                            </div>

                            <div id="div_macro_2">
                                <div id="cuerpo_2">
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="reset" class="btn btn-default"><i class="fa fa-eraser"></i> Limpiar Formulario
                            </button>
                            <button type="submit" id="btn-res-ex" class="btn btn-success pull-right"><i
                                    class="fa fa-save"></i> Guardar Observaciones
                                Cliente
                            </button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

    <div style="display: none;" id="div_distrib_int">
        <div id="div_select1">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label"><strong><i class="fa fa-plus-square-o"></i>
                        Anexo</strong></label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" min="0" id="anniodocint"
                           name="anniodocint">
                </div>
                <label for="inputEmail3" class="col-sm-2 control-label"><strong><i class="fa fa-plus-square-o"></i>
                        Celular</strong></label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" min="0" id="anniodocint"
                           name="anniodocint">
                </div>

            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label"><strong><i class="fa fa-plus-square-o"></i>
                        Nombre</strong></label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" min="0" id="anniodocint"
                           name="anniodocint">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label"><strong><i class="fa fa-plus-square-o"></i>
                        eMail</strong></label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" min="0" id="anniodocint"
                           name="anniodocint">
                </div>
            </div>
            <hr>
        </div>
    </div>

    <div style="display: none;" id="div_distrib_ext">
        <div id="div_select2">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label"><strong><i class="fa fa-plus"></i>
                        Fono Adicional</strong></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="anniodocint"
                           name="anniodocint">
                </div>

                <div class="col-sm-2">
                    <span type="button" class="btn btn-danger" rel="eliminar" id="eliminar"><i
                            class="fa  fa-close"></i></span>
                </div>

            </div>
        </div>
    </div>

    <div style="display: none;" id="div_distrib_ext2">
        <div id="div_select3">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label"><strong><i class="fa fa-plus"></i>
                        Anexo Adicional</strong></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="anniodocint"
                           name="anniodocint">
                </div>

                <div class="col-sm-2">
                    <span type="button" class="btn btn-danger" rel="eliminar" id="eliminar"><i
                            class="fa  fa-close"></i></span>
                </div>

            </div>
        </div>
    </div>

@endsection
