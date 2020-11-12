@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Creación de Usuario
@endsection

@section('contentheader_title')
    Creación de Usuario
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
                <li class=""><a href="#datos_emp" data-toggle="tab" aria-expanded="false"><i class="fa fa-user"></i>
                        <strong>Ingreso del Trabajador</strong></a></li>
                <li class=""><a href="#datos_emp2" data-toggle="tab" aria-expanded="false"><i class="fa fa-user-plus"></i>
                        <strong>Datos del Trabajador</strong></a></li>

            </ul>

            <div class="tab-content">

                <div class="tab-pane active" id="inicio">
                    Hola!
                </div>

                <div class="tab-pane" id="datos_emp">

                    <form class='form-horizontal' action="/GuardaDatosEmp" method="POST" id='formulario_res_ex'
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
                            <hr>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">RUT Persona</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" min="0" id="anniodocint"
                                           name="anniodocint">
                                </div>
                                <label for="inputEmail3" class="col-sm-1 control-label">Nacionalidad</label>
                                <div class="col-sm-4">
                                    <select class="form-control" name="funinvdocint">
                                        <option value="">Chileno</option>
                                        <option value="">Otro</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Fecha de Nac</label>
                                <div class="col-sm-4">
                                    <input type="date" class="form-control" min="0" id="anniodocint"
                                           name="anniodocint">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Ap. Paterno</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" min="0" id="anniodocint"
                                           name="anniodocint">
                                </div>
                                <label for="inputEmail3" class="col-sm-1 control-label">Ap. Materno</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" min="0" id="anniodocint"
                                           name="anniodocint">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Nombres</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" min="0" id="anniodocint"
                                           name="anniodocint">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Estado Civil</label>
                                <div class="col-sm-4">
                                    <select class="form-control" name="funinvdocint">
                                        <option value="">Soltero</option>
                                        <option value="">Casado</option>
                                        <option value="">Divorciado</option>
                                    </select>
                                </div>
                                <label for="inputEmail3" class="col-sm-1 control-label">Profesión</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" min="0" id="anniodocint"
                                           name="anniodocint">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Calle</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" min="0" id="anniodocint"
                                           name="anniodocint">
                                </div>
                                <label for="inputEmail3" class="col-sm-1 control-label">Número</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" min="0" id="anniodocint"
                                           name="anniodocint">
                                </div>
                                <label for="inputEmail3" class="col-sm-1 control-label">Block</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" min="0" id="anniodocint"
                                           name="anniodocint">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Celular</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" min="0" id="anniodocint"
                                           name="anniodocint">
                                </div>
                                <label for="inputEmail3" class="col-sm-1 control-label">Fono Fijo</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" min="0" id="anniodocint"
                                           name="anniodocint">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Correo Personal</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" min="0" id="anniodocint"
                                           name="anniodocint">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Comuna - Región</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="funinvdocint">
                                        <option value="">Concepción - Región del Biobío</option>
                                        <option value="">Santiago - Región Metropolitana</option>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <button type="button" id="" class="btn btn-primary"
                                            onclick=""><i class="fa fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="reset" class="btn btn-default"><i class="fa fa-eraser"></i> Limpiar Formulario
                            </button>
                            <button type="submit" id="btn-res-ex" class="btn btn-success pull-right"><i
                                    class="fa fa-save"></i> Crear Nuevo
                                Usuario
                            </button>
                        </div>
                    </form>

                </div>

                <div class="tab-pane" id="datos_emp2">

                    <form class='form-horizontal' action="/GuardaDatosEmp" method="POST" id='formulario_res_ex'
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
                            <hr>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Fecha Ingreso</label>
                                <div class="col-sm-4">
                                    <input type="date" class="form-control" min="0" id="anniodocint"
                                           name="anniodocint">
                                </div>
                                <label for="inputEmail3" class="col-sm-1 control-label">Contrato</label>
                                <div class="col-sm-4">
                                    <select class="form-control" name="funinvdocint">
                                        <option value="">Freelance</option>
                                        <option value="">Plazo Fijo X Meses</option>
                                        <option value="">Indefinido</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Previsión</label>
                                <div class="col-sm-4">
                                    <select class="form-control" name="funinvdocint">
                                        <option value="">AFP Habitat</option>
                                        <option value="">AFP Capital</option>
                                    </select>
                                </div>
                                <label for="inputEmail3" class="col-sm-1 control-label">Salud</label>
                                <div class="col-sm-4">
                                    <select class="form-control" name="funinvdocint">
                                        <option value="">Fonasa</option>
                                        <option value="">Isapre Colmena</option>
                                        <option value="">Isapre ConSalud</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Calle</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" min="0" id="anniodocint"
                                           name="anniodocint">
                                </div>
                                <label for="inputEmail3" class="col-sm-1 control-label">Número</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" min="0" id="anniodocint"
                                           name="anniodocint">
                                </div>
                                <label for="inputEmail3" class="col-sm-1 control-label">Block</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" min="0" id="anniodocint"
                                           name="anniodocint">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Comuna - Región</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="funinvdocint">
                                        <option value="">Concepción - Región del Biobío</option>
                                        <option value="">Santiago - Región Metropolitana</option>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <button type="button" id="" class="btn btn-primary"
                                            onclick=""><i class="fa fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Cargo</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" min="0" id="anniodocint"
                                           name="anniodocint">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Sueldo Base</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" min="0" id="anniodocint"
                                           name="anniodocint">
                                </div>
                                <label for="inputEmail3" class="col-sm-1 control-label">Asignaciones</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" min="0" id="anniodocint"
                                           name="anniodocint">
                                </div>
                                <label for="inputEmail3" class="col-sm-1 control-label">Comisiones</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" min="0" id="anniodocint"
                                           name="anniodocint">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Tipo Cuenta</label>
                                <div class="col-sm-3">
                                    <select class="form-control" name="funinvdocint">
                                        <option value="">CTA. CORRIENTE</option>
                                        <option value="">CTA. VISTA</option>
                                    </select>
                                </div>
                                <label for="inputEmail3" class="col-sm-1 control-label">N° Cuenta</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" min="0" id="anniodocint"
                                           name="anniodocint">
                                </div>
                                <label for="inputEmail3" class="col-sm-1 control-label">Banco</label>
                                <div class="col-sm-2">
                                    <select class="form-control" name="funinvdocint">
                                        <option value="">BANCOESTADO</option>
                                        <option value="">BANCO BCI</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Correo Institucional</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" min="0" id="anniodocint"
                                           name="anniodocint">
                                </div>
                                <label for="inputEmail3" class="col-sm-1 control-label">Clave Acceso</label>
                                <div class="col-sm-4">
                                    <input type="password" class="form-control" min="0" id="anniodocint"
                                           name="anniodocint">
                                </div>
                            </div>

                        </div>
                        <div class="box-footer">
                            <button type="reset" class="btn btn-default"><i class="fa fa-eraser"></i> Limpiar Formulario
                            </button>
                            <button type="submit" id="btn-res-ex" class="btn btn-success pull-right"><i
                                    class="fa fa-save"></i> Crear Nuevo
                                Usuario
                            </button>
                        </div>
                    </form>

                </div>


                <div class="tab-pane" id="info_legal">

                    <form class='form-horizontal' action="/GuardaInfoLegal" method="POST" id='formulario_res_ex'
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
                                <label for="inputEmail3" class="col-sm-2 control-label">RUT Rep. Legal</label>
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
                                <label for="inputEmail3" class="col-sm-2 control-label">Nacionalidad</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="funinvdocint">
                                        <option value="">Chileno</option>
                                        <option value="">Otra</option>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <button type="button" id="" class="btn btn-primary"
                                            onclick=""><i class="fa fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Fono Fijo</label>
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
                                <label for="inputEmail3" class="col-sm-2 control-label">eMail 1</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" min="0" id="anniodocint"
                                           name="anniodocint">
                                </div>
                                <label for="inputEmail3" class="col-sm-1 control-label">eMail 2</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" min="0" id="anniodocint"
                                           name="anniodocint">
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="reset" class="btn btn-default"><i class="fa fa-eraser"></i> Limpiar Formulario
                            </button>
                            <button type="submit" id="btn-res-ex" class="btn btn-success pull-right"><i
                                    class="fa fa-save"></i> Guardar Info Rep. Legal
                                Cliente
                            </button>
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
                                            onclick="agregar_d_ext();"><i class="fa fa-plus"></i> Agregar otro Anexo
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

                    <form class='form-horizontal' action="/GuardaPlanPago" method="POST" id='formulario_res_ex'
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
                                <label for="inputEmail3" class="col-sm-2 control-label">Plan</label>
                                <div class="col-sm-2">
                                    <select class="form-control" name="funinvdocint">
                                        <option value="">Mensual</option>
                                        <option value="">Semestral</option>
                                        <option value="">Anual</option>
                                    </select>
                                </div>
                                <div class="col-sm-1">
                                    <button type="button" id="" class="btn btn-primary"
                                            onclick=""><i class="fa fa-eye"></i>
                                    </button>
                                </div>

                                <label for="inputEmail3" class="col-sm-1 control-label">Inicio</label>
                                <div class="col-sm-2">
                                    <input type="date" class="form-control" value="" id="foliodocint"
                                           name="foliodocint" >
                                </div>
                                <label for="inputEmail3" class="col-sm-1 control-label">Término</label>
                                <div class="col-sm-2">
                                    <input type="date" class="form-control" min="0" id="anniodocint"
                                           value="" name="anniodocint" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Sistema de Pago</label>
                                <div class="col-sm-3">
                                    <select class="form-control" name="funinvdocint">
                                        <option value="">PAC</option>
                                        <option value="">Tarjeta de Crédito</option>
                                    </select>
                                </div>
                                <div class="col-sm-1">
                                    <button type="button" id="" class="btn btn-primary"
                                            onclick=""><i class="fa fa-eye"></i>
                                    </button>
                                </div>

                                <label for="inputEmail3" class="col-sm-1 control-label">Titular</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" min="0" id="anniodocint"
                                           value="" name="anniodocint" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Rut Titular</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" min="0" id="anniodocint"
                                           name="anniodocint">
                                </div>
                                <label for="inputEmail3" class="col-sm-1 control-label">Tipo Cta.</label>
                                <div class="col-sm-4">
                                    <select class="form-control" name="funinvdocint">
                                        <option value="">Cta. Corriente</option>
                                        <option value="">Tarjeta de Crédito</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">N° Cuenta</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" min="0" id="anniodocint"
                                           name="anniodocint">
                                </div>
                                <label for="inputEmail3" class="col-sm-1 control-label">Banco</label>
                                <div class="col-sm-4">
                                    <select class="form-control" name="funinvdocint">
                                        <option value="">Banco de Chile</option>
                                        <option value="">BancoEstado</option>
                                        <option value="">Banco ITAU</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="reset" class="btn btn-default"><i class="fa fa-eraser"></i> Limpiar Formulario
                            </button>
                            <button type="submit" id="btn-res-ex" class="btn btn-success pull-right"><i
                                    class="fa fa-save"></i> Guardar Plan de Pago Cliente
                            </button>
                        </div>
                    </form>

                </div>

                <div class="tab-pane" id="otros">

                    <form class='form-horizontal' action="/GuardaOtros" method="POST" id='formulario_res_ex'
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
                <label for="inputEmail3" class="col-sm-2 control-label"><strong><i class="fa fa-plus"></i>
                        Anexo</strong></label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" min="0" id="anniodocint"
                           name="anniodocint">
                </div>
                <label for="inputEmail3" class="col-sm-2 control-label"><strong><i class="fa fa-plus"></i>
                        Celular</strong></label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" min="0" id="anniodocint"
                           name="anniodocint">
                </div>

            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label"><strong><i class="fa fa-plus"></i>
                        Nombre</strong></label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" min="0" id="anniodocint"
                           name="anniodocint">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label"><strong><i class="fa fa-plus"></i>
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
                        Adicional</strong></label>
                <div class="col-sm-8">
                    <select class="form-control" name="idgrupextdocint[]">

                    </select>
                </div>

                <div class="col-sm-2">
                    <span type="button" class="btn btn-danger" rel="eliminar" id="eliminar"><i
                            class="fa  fa-close"></i></span>
                </div>

            </div>
        </div>
    </div>

    <script>
        function agregar_d_int_ord() {
            var agrega = $("#div_select1").html();
            $("#cuerpo_int_ord").append(agrega);
        }

        function agregar_d_ext_ord() {
            var agrega = $("#div_select2").html();
            $("#cuerpo_ext_ord").append(agrega);
        }

        function agregar_d_int() {
            var agrega = $("#div_select1").html();
            $("#cuerpo_1").append(agrega);
        }

        function agregar_d_ext() {
            var agrega = $("#div_select2").html();
            $("#cuerpo_2").append(agrega);
        }

        function agregar_d_int_afe() {
            var agrega = $("#div_select1").html();
            $("#cuerpo_int_af").append(agrega);
        }
    </script>

    <div class="modal fade" id="modal-res_ex">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Últimas Resoluciones Exentas</h4>
                </div>
                <div class="modal-body">
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-list-alt"></i> Detalle de Documentos</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table table-condensed">
                                <tbody>
                                <tr>
                                    <th style="width: 10px"># Doc</th>
                                    <th>Materia</th>
                                    <th style="width: 10px">Ficha</th>
                                    <th style="width: 40px">Privacidad</th>
                                </tr>


                                </tbody>
                            </table>
                            <hr>
                        </div>
                        <!-- /.box-body -->
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="modal-res_af">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Formulario de Ingreso de Resoluciones Afectas</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body no-padding">
                        <table class="table table-condensed">
                            <tbody>
                            <tr>
                                <th style="width: 10px"># Doc</th>
                                <th>Materia</th>
                                <th style="width: 10px">Doc</th>
                                <th style="width: 40px">Privacidad</th>
                            </tr>

                            </tbody>
                        </table>
                        <hr>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="modal-ord">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Formulario de Ingreso de Ordinarios</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body no-padding">
                        <table class="table table-condensed">
                            <tbody>
                            <tr>
                                <th style="width: 10px"># Doc</th>
                                <th>Materia</th>
                                <th style="width: 10px">Doc</th>
                                <th style="width: 40px">Privacidad</th>
                            </tr>

                            </tbody>
                        </table>
                        <hr>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <script src="https://code.jquery.com/jquery-1.11.3.js"></script>

    <script>
        $(document).on('ready', function () {
            $('#btn-res-ex').click(function () {
                if ($("#fecdocint").val() == "") {
                    $('#resp').html("" +
                        "<div class=\"alert alert-warning alert-dismissable\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                        "<h4><i class=\"icon fa fa-warning\"></i> ¡ALERTA DE SISTEMA!</h4>" +
                        "Campo \"Fecha\" es obligatorio.\n" +
                        "</div>");
                    $("#fecdocint").focus();
                    $("#fecdocint").css('border', '1px solid red');
                    return;
                } else if ($("#matbitdocint").val() == "") {
                    $('#resp').html("" +
                        "<div class=\"alert alert-warning alert-dismissable\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                        "<h4><i class=\"icon fa fa-warning\"></i> ¡ALERTA DE SISTEMA!</h4>" +
                        "Campo \"Materia\" es obligatorio.\n" +
                        "</div>");
                    $("#matbitdocint").focus();
                    $("#matbitdocint").css('border', '1px solid red');
                    return;
                }
            });

            $('#btn-res-af').click(function () {
                if ($("#fecdocint2").val() == "") {
                    $('#resp').html("" +
                        "<div class=\"alert alert-warning alert-dismissable\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                        "<h4><i class=\"icon fa fa-warning\"></i> ¡ALERTA DE SISTEMA!</h4>" +
                        "Campo \"Fecha\" es obligatorio.\n" +
                        "</div>");
                    $("#fecdocint2").focus();
                    $("#fecdocint2").css('border', '1px solid red');
                    return;
                } else if ($("#matbitdocint2").val() == "") {
                    $('#resp').html("" +
                        "<div class=\"alert alert-warning alert-dismissable\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                        "<h4><i class=\"icon fa fa-warning\"></i> ¡ALERTA DE SISTEMA!</h4>" +
                        "Campo \"Materia\" es obligatorio.\n" +
                        "</div>");
                    $("#matbitdocint2").focus();
                    $("#matbitdocint2").css('border', '1px solid red');
                    return;
                }
            });

            $('#btn-ordinarios').click(function () {
                if ($("#fecdocint3").val() == "") {
                    $('#resp').html("" +
                        "<div class=\"alert alert-warning alert-dismissable\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                        "<h4><i class=\"icon fa fa-warning\"></i> ¡ALERTA DE SISTEMA!</h4>" +
                        "Campo \"Fecha\" es obligatorio.\n" +
                        "</div>");
                    $("#fecdocint3").focus();
                    $("#fecdocint3").css('border', '1px solid red');
                    return;
                } else if ($("#adocintord2").val() == "") {
                    $('#resp').html("" +
                        "<div class=\"alert alert-warning alert-dismissable\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                        "<h4><i class=\"icon fa fa-warning\"></i> ¡ALERTA DE SISTEMA!</h4>" +
                        "Campo \"A\" es obligatorio.\n" +
                        "</div>");
                    $("#adocintord2").focus();
                    $("#adocintord2").css('border', '1px solid red');
                    return;

                } else if ($("#matbitdocint3").val() == "") {
                    $('#resp').html("" +
                        "<div class=\"alert alert-warning alert-dismissable\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                        "<h4><i class=\"icon fa fa-warning\"></i> ¡ALERTA DE SISTEMA!</h4>" +
                        "Campo \"Materia\" es obligatorio.\n" +
                        "</div>");
                    $("#matbitdocint3").focus();
                    $("#matbitdocint3").css('border', '1px solid red');
                    return;
                }
            });
            return;
        });
    </script>

    <script>
        function eventos_fechas() {
            $("#fecdocint").css('border', '2px solid green');
            $('#resp').html("");
            return;
        }

        function eventos_materias(e) {
            $("#matbitdocint").css('border', '2px solid green');
            var tecla = e.value;
            $("#matbitdocint").val(tecla.toUpperCase());
            $('#resp').html("");
            return;
        }

        function eventos_obs(e) {
            $("#ingobsdocint").css('border', '2px solid green');
            var tecla = e.value;
            $("#ingobsdocint").val(tecla.toUpperCase());
            $('#resp').html("");
            return;
        }

        function eventos_ref(e) {
            $("#ingrefdocint").css('border', '2px solid green');
            var tecla = e.value;
            $("#ingrefdocint").val(tecla.toUpperCase());
            $('#resp').html("");
            return;
        }

        function eventos_fechas2() {
            $("#fecdocint2").css('border', '2px solid green');
            $('#resp').html("");
            return;
        }

        function eventos_materias2(e) {
            $("#matbitdocint2").css('border', '2px solid green');
            var tecla = e.value;
            $("#matbitdocint2").val(tecla.toUpperCase());
            $('#resp').html("");
            return;
        }

        function eventos_obs2(e) {
            $("#ingobsdocint2").css('border', '2px solid green');
            var tecla = e.value;
            $("#ingobsdocint2").val(tecla.toUpperCase());
            $('#resp').html("");
            return;
        }

        function eventos_ref2(e) {
            $("#ingrefdocint2").css('border', '2px solid green');
            var tecla = e.value;
            $("#ingrefdocint2").val(tecla.toUpperCase());
            $('#resp').html("");
            return;
        }

        function eventos_fechas3() {
            $("#fecdocint3").css('border', '2px solid green');
            $('#resp').html("");
            return;
        }

        function eventos_materias3(e) {
            $("#matbitdocint3").css('border', '2px solid green');
            var tecla = e.value;
            $("#matbitdocint3").val(tecla.toUpperCase());
            $('#resp').html("");
            return;
        }

        function eventos_a(e) {
            $("#adocintord2").css('border', '2px solid green');
            var tecla = e.value;
            $("#adocintord2").val(tecla.toUpperCase());
            $('#resp').html("");
            return;
        }

        function eventos_obs3(e) {
            $("#ingobsdocint3").css('border', '2px solid green');
            var tecla = e.value;
            $("#ingobsdocint3").val(tecla.toUpperCase());
            $('#resp').html("");
            return;
        }

        function eventos_ref3(e) {
            $("#ingrefdocint3").css('border', '2px solid green');
            var tecla = e.value;
            $("#ingrefdocint3").val(tecla.toUpperCase());
            $('#resp').html("");
            return;
        }
    </script>
@endsection
