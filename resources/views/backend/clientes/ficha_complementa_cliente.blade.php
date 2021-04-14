@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Complementa Registro Cliente
@endsection

@section('contentheader_title')
    Complementa Registro Cliente
@endsection

@section('contentheader_description')
    - Cliente Nuevo
@endsection

@section('main-content')

    <div class="row">
        @if(1==2)
            <div id="panel_principal" class="panel panel-success">

            </div>
        @endif
        <div class="col-md-10">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#datos_principales" data-toggle="tab"><i class="fa fa-industry"></i>
                            Datos Básicos del Cliente</a>
                    </li>
                    <li class=""><a href="#representantes_legales" data-toggle="tab"><i
                                class="fa fa-user-plus"></i>
                            Representante(s) Legal(es)</a>
                    </li>
                    <li class=""><a href="#plan_inicial" data-toggle="tab"><i
                                class="fa fa-rocket"></i>
                            Plan Inicial Contrato</a>
                    </li>
                    <li class=""><a href="#contactos" data-toggle="tab"><i
                                class="fa fa-users"></i>
                            Contactos</a>
                    </li>
                    <li class=""><a href="#info_llamada" data-toggle="tab"><i
                                class="fa fa-phone"></i>
                            Info Llamada</a>
                    </li>
                    <li class=""><a href="#documentos_cliente" data-toggle="tab"><i
                                class="fa fa-file-pdf-o"></i>
                            Documentación</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="active tab-pane" id="datos_principales">

                        <div class="box-header with-border">
                            <h3 class="box-title">{{ $cliente->razonsoccliente }} -
                                {{ $cliente->rutcliente }}</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <strong><i class="fa fa-spinner margin-r-5"></i> Giro</strong>

                            <p class="text-muted">
                                {{ $cliente->girocliente }}
                            </p>

                            <hr>

                            <strong><i class="fa fa-map-marker margin-r-5"></i> Dirección</strong>

                            <p class="text-muted">{{ $cliente->callecliente }} {{ $cliente->numcliente }} {{ $cliente->blockcliente }}
                                <br>
                                {{ $cliente->nombrecomuna }}, REGIÓN {{ $cliente->nombreregion }}
                            </p>

                            <hr>

                            <strong><i class="fa fa-at margin-r-5"></i> Contacto</strong>

                            <p class="text-muted">+56 {{ $cliente->fonocliente }}
                                <br>
                                {{ $cliente->sitiowebcliente }}
                            </p>

                            <hr>
                        </div>
                        <!-- /.box-body -->

                    </div>

                    <div class="tab-pane" id="representantes_legales">

                        <div class="row invoice-info">
                            @foreach($replegales as $listado)
                                <div class="col-sm-4 invoice-col">
                                    Representante Legal <br><br>
                                    <address>
                                        <strong>{{ $listado->rutreplegal }}</strong><br>
                                        {{ $listado->nombresrlegal }} {{ $listado->apaternorlegal }} {{ $listado->amaternorlegal }}
                                        <br>
                                        {{ $listado->nacionalidadrlegal }}<br>
                                        {{ $listado->ffijorlegal }} - {{ $listado->celrlegal }}<br>
                                        {{ $listado->mail1replegal }} - {{ $listado->mail2replegal }}
                                    </address>
                                </div>
                            @endforeach
                        </div>

                        <div class="box box-warning">
                            <form class="form-horizontal" name="form1" id="form_representantes_legales">
                                <div class="box-body">
                                    <div id="alerta_tab">

                                    </div>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="idcli" value="{{ $cliente->idclientes }}">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-1 control-label">RUT
                                            R. Legal</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" min="0" id="idrut_rep"
                                                   name="rut" onfocusout="validaRut(document.form1.rut.value)"
                                                   required>
                                        </div>
                                        <label for="inputEmail3" class="col-sm-1 control-label">Nacionalidad</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" min="0" id="nac_rep"
                                                   name="nac_rep" onkeyup="mayusculas_nac(this)" value="CHILENA"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-1 control-label">Paterno</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" min="0" id="pat_rep"
                                                   name="pat_rep" onkeyup="mayusculas_p(this)" required>
                                        </div>
                                        <label for="inputEmail3" class="col-sm-1 control-label">Materno</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" min="0" id="mat_rep"
                                                   name="mat_rep" onkeyup="mayusculas_m(this)" required>
                                        </div>
                                        <label for="inputEmail3" class="col-sm-1 control-label">Nombres</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" min="0" id="nombres_rep"
                                                   name="nombres_rep" onkeyup="mayusculas_nr(this)" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-1 control-label">Estado Civil</label>
                                        <div class="col-sm-2">
                                            <select class="form-control" name="estadocivil" id="ecivil">
                                                <option value="1">CASADO</option>
                                                <option value="2">SOLTERO</option>
                                                <option value="3">VIUDO</option>
                                                <option value="4">SEPARADO</option>
                                                <option value="5">DIVORCIADO</option>
                                            </select>
                                        </div>
                                        <label for="inputEmail3" class="col-sm-1 control-label">Fono Fijo</label>
                                        <div class="col-sm-3">
                                            <input type="number" class="form-control" min="0" id="fijo_rep"
                                                   name="fijo_rep" required>
                                        </div>
                                        <label for="inputEmail3" class="col-sm-1 control-label">Fono Celular</label>
                                        <div class="col-sm-3">
                                            <input type="number" class="form-control" min="0" id="cel_rep"
                                                   name="cel_rep">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-1 control-label">Correo 1</label>
                                        <div class="col-sm-5">
                                            <input type="email" class="form-control" min="0" id="mail1_rep"
                                                   name="mail1_rep" onkeyup="mayusculas_c1(this)" required>
                                        </div>
                                        <label for="inputEmail3" class="col-sm-1 control-label">Correo 2</label>
                                        <div class="col-sm-4">
                                            <input type="email" class="form-control" min="0" id="mail2_rep"
                                                   name="mail2_rep" onkeyup="mayusculas_c2(this)" required>
                                        </div>
                                    </div>
                                </div>

                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="reset" class="btn btn-default"><i class="fa fa-eraser"></i>
                                        Limpiar
                                        Formulario
                                    </button>

                                    <button type="button" class="btn btn-success pull-right"
                                            id="btn_add_rl">
                                        <i
                                            class="fa fa-save"></i>
                                        Agregar Representante Legal
                                    </button>

                                </div>
                                <!-- /.box-footer -->
                            </form>
                        </div>

                    </div>

                    <div class="tab-pane" id="plan_inicial">

                        @if($planininum==0)
                            <div class="box-header with-border">
                                <h3 class="box-title">SIN PLAN INICIAL CREADO</h3>
                            </div>
                            <div class="box box-warning">
                                <form class="form-horizontal" name="form2" id="form_plan_ini">
                                    <div class="box-body">
                                        <div id="alerta_tab2">

                                        </div>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="idcli" value="{{ $cliente->idclientes }}">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-1 control-label">Plan</label>
                                            <div class="col-sm-3">
                                                <select class="form-control" name="idplan" id="planes">
                                                    @foreach($planes as $listado)
                                                        <option
                                                            value="{{ $listado->idplanes }}">{{ $listado->nombreplan }}
                                                            -
                                                            $ {{ number_format($listado->valorcicloplan, 0, ',', '.') }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <label for="inputEmail3" class="col-sm-1 control-label">Fecha Inicio</label>
                                            <div class="col-sm-2">
                                                <input type="date" class="form-control" min="0" id="feciniplan"
                                                       name="feciniplan" onfocusout="fechaini(this)" required>
                                            </div>
                                            <label for="inputEmail3" class="col-sm-1 control-label">Fecha Fin</label>
                                            <div class="col-sm-2">
                                                <input type="date" class="form-control" min="0" id="fecfinplan"
                                                       name="fecfinplan" onfocusout="fechafin(this)">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-1 control-label">Forma Pago</label>
                                            <div class="col-sm-4">
                                                <select class="form-control" name="idfpago" id="fpago">
                                                    @foreach($fpago as $listado)
                                                        <option
                                                            value="{{ $listado->idsispago }}">{{ $listado->nombresispago }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- /.box-body -->
                                    <div class="box-footer">
                                        <button type="reset" class="btn btn-default"><i class="fa fa-eraser"></i>
                                            Limpiar
                                            Formulario
                                        </button>

                                        <button type="button" class="btn btn-success pull-right"
                                                id="btn_add_plan">
                                            <i
                                                class="fa fa-save"></i>
                                            Guardar Información Plan Inicial
                                        </button>

                                    </div>
                                    <!-- /.box-footer -->
                                </form>
                            </div>
                        @else
                            <div class="box-header with-border">
                                <h3 class="box-title">{{ $planini->nombreplan }} -
                                    $ {{ number_format($planini->valorcicloplan, 0, ',', '.') }}</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <strong><i class="fa fa-rocket margin-r-5"></i> Inicio del Plan</strong>

                                <p class="text-muted">
                                    {{ $planini->feciniserv }}
                                </p>

                                <hr>

                                <strong><i class="fa fa-calendar-check-o margin-r-5"></i> Fin del Plan</strong>

                                <p class="text-muted">
                                    {{ $planini->fecfinserv }}
                                </p>

                                <hr>

                                <strong><i class="fa fa-dollar margin-r-5"></i> Forma de Pago</strong>

                                <p class="text-muted">
                                    {{ $planini->nombresispago }}
                                </p>

                                <hr>
                            </div>

                            @if($planini->vtcall_sis_pago_idsispago==3)
                                @if($fpini==0)
                                    <div class="box box-warning">
                                        <form class="form-horizontal" name="form3" id="form_pag_pac">
                                            <div class="box-body">
                                                <div id="alerta_tab3">

                                                </div>
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="idserv" value="{{ $planini->idservcont }}">
                                                <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-1 control-label">RUT del
                                                        Titular</label>
                                                    <div class="col-sm-2">
                                                        <input type="text" class="form-control" min="0" id="idrut_tit2"
                                                               name="rut3" required>
                                                    </div>
                                                    <label for="inputEmail3" class="col-sm-1 control-label">Nombre
                                                        Titular</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" min="0"
                                                               id="nom_titular2"
                                                               name="nom_titular2" onkeyup="mayusculas_nt2(this)">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="inputEmail3"
                                                           class="col-sm-1 control-label">Banco</label>
                                                    <div class="col-sm-2">
                                                        <select class="form-control" name="idbanco" id="idbanco">
                                                            @foreach($bancos as $listado)
                                                                <option
                                                                    value="{{$listado->idbanco}}">{{ $listado->nombrebanco }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <label for="inputEmail3"
                                                           class="col-sm-1 control-label">Tipo Cuenta</label>
                                                    <div class="col-sm-2">
                                                        <select class="form-control" name="idtipocuenta"
                                                                id="idtipocuenta">
                                                            @foreach($tcuenta as $listado)
                                                                <option
                                                                    value="{{$listado->idtipocuenta}}">{{ $listado->nombretipocuenta }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <label for="inputEmail3" class="col-sm-1 control-label">N°
                                                        Cuenta</label>
                                                    <div class="col-sm-2">
                                                        <input type="text" class="form-control" id="numcta"
                                                               name="numcta">
                                                    </div>

                                                    <label for="inputEmail3" class="col-sm-1 control-label">Fecha de
                                                        Cargo</label>
                                                    <div class="col-sm-2">
                                                        <input type="date" class="form-control" min="0" id="feccargo2"
                                                               name="feccargo2" onfocusout="fechacargo2(this)">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- /.box-body -->
                                            <div class="box-footer">
                                                <button type="reset" class="btn btn-default"><i
                                                        class="fa fa-eraser"></i>
                                                    Limpiar
                                                    Formulario
                                                </button>

                                                <button type="button" class="btn btn-success pull-right"
                                                        id="btn_add_fp_pac">
                                                    <i
                                                        class="fa fa-save"></i>
                                                    Guardar Información Pago Automático
                                                </button>

                                            </div>
                                            <!-- /.box-footer -->
                                        </form>
                                    </div>
                                @else
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Detalles Pago Automático de Cuentas</h3>
                                    </div>
                                    <div class="box-body">
                                        <strong><i class="fa fa-user margin-r-5"></i> Nombre y Rut del Titular</strong>

                                        <p class="text-muted">
                                            {{ $dfini->titularpago }} {{ $dfini->ruttitularpago }}
                                        </p>

                                        <hr>

                                        <strong><i class="fa fa-calendar-check-o margin-r-5"></i> Banco, Tipo de Cuenta,
                                            N° Cuenta y
                                            Fecha de Cargo</strong>

                                        <p class="text-muted">
                                            @if($dfini->vtcall_bancos_idbanco==1) BANCO
                                            ITAU @elseif($dfini->vtcall_bancos_idbanco==2)
                                                BANCO BCI @elseif($dfini->vtcall_bancos_idbanco==3) BANCO
                                            SANTANDER @endif /
                                            @if($dfini->vtcall_tipo_cuenta_idtipocuenta==1) CUENTA
                                            CORRIENTE @elseif($dfini->vtcall_tipo_cuenta_idtipocuenta==2)
                                                CUENTA VISTA @elseif($dfini->vtcall_tipo_cuenta_idtipocuenta==3)
                                                CHEQUERA ELECTRÓNICA @endif
                                            - {{ $dfini->numcuentapago }} - <strong>{{ $dfini->feccargopago }}</strong>
                                        </p>

                                        <hr>
                                    </div>
                                @endif
                            @elseif($planini->vtcall_sis_pago_idsispago==4)
                                @if($fpini==0)
                                    <div class="box box-warning">
                                        <form class="form-horizontal" name="form4" id="form_pag_tc">
                                            <div class="box-body">
                                                <div id="alerta_tab4">

                                                </div>
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="idserv" value="{{ $planini->idservcont }}">
                                                <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-1 control-label">RUT del
                                                        Titular</label>
                                                    <div class="col-sm-2">
                                                        <input type="text" class="form-control" min="0" id="idrut_tit"
                                                               name="rut2" required>
                                                    </div>
                                                    <label for="inputEmail3" class="col-sm-1 control-label">Nombre
                                                        Titular</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" min="0" id="nom_titular"
                                                               name="nom_titular" onkeyup="mayusculas_nt(this)">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="inputEmail3"
                                                           class="col-sm-1 control-label">Tarjeta</label>
                                                    <div class="col-sm-3">
                                                        <select class="form-control" name="idtarjeta" id="idtarjeta">
                                                            <option value="1">VISA</option>
                                                            <option value="2">MASTERCARD</option>
                                                        </select>
                                                    </div>
                                                    <label for="inputEmail3" class="col-sm-1 control-label">N°
                                                        Tarjeta</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" min="0" id="numtc"
                                                               name="numtc">
                                                    </div>

                                                    <label for="inputEmail3" class="col-sm-1 control-label">Fecha de
                                                        Cargo</label>
                                                    <div class="col-sm-2">
                                                        <input type="date" class="form-control" min="0" id="feccargo"
                                                               name="feccargo" onfocusout="fechacargo(this)">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- /.box-body -->
                                            <div class="box-footer">
                                                <button type="reset" class="btn btn-default"><i
                                                        class="fa fa-eraser"></i>
                                                    Limpiar
                                                    Formulario
                                                </button>

                                                <button type="button" class="btn btn-success pull-right"
                                                        id="btn_add_fp_tc">
                                                    <i
                                                        class="fa fa-save"></i>
                                                    Guardar Información Tarjeta de Crédito
                                                </button>

                                            </div>
                                            <!-- /.box-footer -->
                                        </form>
                                    </div>
                                @else
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Detalles Pago Tarjeta de Crédito</h3>
                                    </div>
                                    <div class="box-body">
                                        <strong><i class="fa fa-user margin-r-5"></i> Nombre y Rut del Titular</strong>

                                        <p class="text-muted">
                                            {{ $dfini->titularpago }} {{ $dfini->ruttitularpago }}
                                        </p>

                                        <hr>

                                        <strong><i class="fa fa-calendar-check-o margin-r-5"></i> Tarjeta, Número de
                                            Tarjeta y
                                            Fecha de Cargo</strong>

                                        <p class="text-muted">
                                            @if($dfini->tarjetapago==1) VISA @elseif($dfini->tarjetapago==2)
                                                MASTERCARD @endif
                                            - {{ $dfini->numtarjeta }} - <strong>{{ $dfini->feccargopago }}</strong>
                                        </p>

                                        <hr>
                                    </div>
                                @endif
                            @endif
                        @endif
                    </div>

                    <div class="tab-pane" id="contactos">
                        <div class="row invoice-info">
                            @foreach($contactos as $listado)
                                <div class="col-sm-4 invoice-col">
                                    Contacto: <br><br>

                                    <address>
                                        <strong>{{ $listado->nombrescont }} {{ $listado->paternocont }} {{ $listado->maternocont }}</strong><br>
                                        {{ $listado->celcont }}<br>
                                        {{ $listado->mailcont }}<br>
                                        {{ $listado->anex1cont }} - {{ $listado->anex2cont }}
                                        - {{ $listado->anex3cont }}<br>
                                    </address>
                                </div>
                            @endforeach
                        </div>

                        <div class="box box-warning">
                            <form class="form-horizontal" name="form5" id="form_contactos">
                                <div class="box-body">
                                    <div id="alerta_tab5">

                                    </div>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="idcli" value="{{ $cliente->idclientes }}">

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-1 control-label">Paterno</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="cont_pat"
                                                   name="cont_pat" onkeyup="mayusculas_pat(this)" required>
                                        </div>
                                        <label for="inputEmail3" class="col-sm-1 control-label">Materno</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="cont_mat"
                                                   name="cont_mat" onkeyup="mayusculas_mat(this)" required>
                                        </div>
                                        <label for="inputEmail3" class="col-sm-1 control-label">Nombres</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="cont_nombres"
                                                   name="cont_nombres" onkeyup="mayusculas_nombres(this)" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-1 control-label">Celular</label>
                                        <div class="col-sm-2">
                                            <input type="number" class="form-control" id="cont_cel"
                                                   name="cont_cel" onkeyup="mayusculas_cel(this)" required>
                                        </div>
                                        <label for="inputEmail3" class="col-sm-1 control-label">Email</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="cont_mail"
                                                   name="cont_mail" onkeyup="mayusculas_mail(this)" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-1 control-label">Anexo</label>
                                        <div class="col-sm-2">
                                            <select class="form-control" name="anexo" id="anexo">
                                                @foreach($anexos as $listado)
                                                    <option
                                                        value="{{ $listado->anexdisp }}">{{ $listado->anexdisp }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="reset" class="btn btn-default"><i class="fa fa-eraser"></i>
                                        Limpiar
                                        Formulario
                                    </button>

                                    <button type="button" class="btn btn-success pull-right"
                                            id="btn_add_contacto">
                                        <i
                                            class="fa fa-save"></i>
                                        Agregar Contactos
                                    </button>

                                </div>
                                <!-- /.box-footer -->
                            </form>
                        </div>
                    </div>

                    <div class="tab-pane" id="info_llamada">

                        <div class="box box-success">
                            <div class="box-header with-border">
                                <h3 class="box-title"><i class="fa fa-mobile-phone"></i> Contestación de la Llamada -
                                    Entrante: {{ $cliente->fonoentra1 }} - Entrante 2: {{ $cliente->fonoentra2 }}</h3>
                            </div>
                            <div class="box-body">
                                @if($cliente->fomcontllamada=='')
                                    NO EXISTE REGISTRO DE FORMA COMO CONTESTAR LLAMADAS
                                @else
                                    {{ $cliente->fomcontllamada }}
                                @endif
                            </div>
                            <!-- /.box-body -->
                        </div>

                        @if($cliente->fomcontllamada=='')
                            <div class="box box-warning">
                                <form class="form-horizontal" name="form6" id="form_contestacion">
                                    <div class="box-body">
                                        <div id="alerta_tab6">

                                        </div>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="idcli" value="{{ $cliente->idclientes }}">

                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-1 control-label">Contestación</label>
                                            <div class="col-sm-10">
                                            <textarea class="form-control" id="contestacion" name="contestacion"
                                                      rows="2"
                                                      onkeyup="mayusculas_contestacion(this)" required>
                                            </textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Asignación de ID
                                                Entrante</label>
                                            <div class="col-sm-2">
                                                <select class="form-control" name="fonoip1" id="fonoip1">
                                                    @foreach($folio_int as $listado)
                                                        <option
                                                            value="{{ $listado->numfolioint }}">{{ $listado->numfolioint }}
                                                            - {{ $listado->numexterno}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- /.box-body -->
                                    <div class="box-footer">
                                        <button type="reset" class="btn btn-default"><i class="fa fa-eraser"></i>
                                            Limpiar
                                            Formulario
                                        </button>

                                        <button type="button" class="btn btn-success pull-right"
                                                id="btn_add_contestación">
                                            <i
                                                class="fa fa-save"></i>
                                            Agregar Contestación
                                        </button>

                                    </div>
                                    <!-- /.box-footer -->
                                </form>
                            </div>
                        @endif

                        <div class="box box-warning">
                            <div class="box-header with-border">
                                <h3 class="box-title"><i class="fa fa-warning"></i> Observaciones Generales</h3>
                            </div>
                            <div class="box-body">
                                @if($cliente->infoextra=='')
                                    NO EXISTE INFORMACIÓN EXTRA DISPONIBLE
                                @else
                                    {{ $cliente->infoextra }}
                                @endif
                            </div>
                            <!-- /.box-body -->
                        </div>

                        @if($cliente->infoextra=='')
                            <div class="box box-warning">
                                <form class="form-horizontal" name="form7" id="form_infoextra">
                                    <div class="box-body">
                                        <div id="alerta_tab7">

                                        </div>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="idcli" value="{{ $cliente->idclientes }}">

                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-1 control-label">Info Extra</label>
                                            <div class="col-sm-10">
                                            <textarea class="form-control" id="infoextra" name="infoextra" rows="2"
                                                      onkeyup="mayusculas_infoextra(this)" required>
                                            </textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- /.box-body -->
                                    <div class="box-footer">
                                        <button type="reset" class="btn btn-default"><i class="fa fa-eraser"></i>
                                            Limpiar
                                            Formulario
                                        </button>

                                        <button type="button" class="btn btn-success pull-right"
                                                id="btn_info_general">
                                            <i
                                                class="fa fa-save"></i>
                                            Agregar Información Extra
                                        </button>

                                    </div>
                                    <!-- /.box-footer -->
                                </form>
                            </div>
                        @endif

                    </div>

                    <div class="tab-pane" id="documentos_cliente">

                    </div>
                </div>

                <!-- /.tab-content -->
            </div>
        </div>

        <div class="col-md-2">
            <!-- Profile Image -->
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h4 class="box-title"><i class="fa fa-info"></i> Información del Usuario</h4>
                </div>
                <div class="box-body box-profile">

                    <center><img src="https://adminlte.io/themes/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle"
                                 alt="User Image"></center>

                    <hr>
                    <center><h4>Daniel E. Gutiérrez Fariña</h4></center>
                </div>
                <!-- /.box-body -->
            </div>


        </div>

    </div>

    <script>
        function mayusculas_p(e) {
            var tecla = e.value;
            $("#pat_rep").val(tecla.toUpperCase());
            $("#pat_rep").css('border', '2px solid green');
            return;
        }

        function mayusculas_m(e) {
            var tecla = e.value;
            $("#mat_rep").val(tecla.toUpperCase());
            $("#mat_rep").css('border', '2px solid green');
            return;
        }

        function mayusculas_nr(e) {
            var tecla = e.value;
            $("#nombres_rep").val(tecla.toUpperCase());
            $("#nombres_rep").css('border', '2px solid green');
            return;
        }

        function mayusculas_nac(e) {
            var tecla = e.value;
            $("#nac_rep").val(tecla.toUpperCase());
            $("#nac_rep").css('border', '2px solid green');
            return;
        }

        function mayusculas_c1(e) {
            var tecla = e.value;
            $("#mail1_rep").val(tecla.toUpperCase());
            $("#mail1_rep").css('border', '2px solid green');
            return;
        }

        function mayusculas_c2(e) {
            var tecla = e.value;
            $("#mail2_rep").val(tecla.toUpperCase());
            $("#mail2_rep").css('border', '2px solid green');
            return;
        }

        function mayusculas_nt(e) {
            var tecla = e.value;
            $("#nom_titular").val(tecla.toUpperCase());
            $("#nom_titular").css('border', '2px solid green');
            return;
        }

        function mayusculas_nt2(e) {
            var tecla = e.value;
            $("#nom_titular2").val(tecla.toUpperCase());
            $("#nom_titular2").css('border', '2px solid green');
            return;
        }

        function mayusculas_pat(e) {
            var tecla = e.value;
            $("#cont_pat").val(tecla.toUpperCase());
            $("#cont_pat").css('border', '2px solid green');
            return;
        }

        function mayusculas_mat(e) {
            var tecla = e.value;
            $("#cont_mat").val(tecla.toUpperCase());
            $("#cont_mat").css('border', '2px solid green');
            return;
        }

        function mayusculas_nombres(e) {
            var tecla = e.value;
            $("#cont_nombres").val(tecla.toUpperCase());
            $("#cont_nombres").css('border', '2px solid green');
            return;
        }

        function mayusculas_cel(e) {
            var tecla = e.value;
            $("#cont_cel").val(tecla.toUpperCase());
            $("#cont_cel").css('border', '2px solid green');
            return;
        }

        function mayusculas_mail(e) {
            var tecla = e.value;
            $("#cont_mail").val(tecla.toUpperCase());
            $("#cont_mail").css('border', '2px solid green');
            return;
        }

        function mayusculas_contestacion(e) {
            var tecla = e.value;
            $("#contestacion").val(tecla.toUpperCase());
            $("#contestacion").css('border', '2px solid green');
            return;
        }

        function mayusculas_infoextra(e) {
            var tecla = e.value;
            $("#infoextra").val(tecla.toUpperCase());
            $("#infoextra").css('border', '2px solid green');
            return;
        }

        function fechaini(e) {
            $("#feciniplan").css('border', '2px solid green');
            return;
        }

        function fechafin(e) {
            $("#fecfinplan").css('border', '2px solid green');
            return;
        }

        function fechacargo(e) {
            $("#feccargo").css('border', '2px solid green');
            return;
        }

    </script>
    <script type="text/javascript">

        function validaRut(varrut) {

            if (Rut(varrut)) {
                document.form1.submit();

            }
        }

        function revisarDigito(dvr) {
            dv = dvr + ""
            if (dv != '0' && dv != '1' && dv != '2' && dv != '3' && dv != '4' && dv != '5' && dv != '6' && dv != '7' && dv != '8' && dv != '9' && dv != 'k' && dv != 'K') {
                alert("Debe ingresar un digito verificador valido");
                window.document.form1.rut.focus();
                window.document.form1.rut.select();
                return false;
            }
            return true;
        }

        function revisarDigito2(crut) {
            largo = crut.length;
            if (largo < 2) {
                alert("Debe ingresar el rut completo 2")
                window.document.form1.rut.focus();
                window.document.form1.rut.select();
                return false;
            }
            if (largo > 2)
                rut = crut.substring(0, largo - 1);
            else
                rut = crut.charAt(0);
            dv = crut.charAt(largo - 1);
            revisarDigito(dv);

            if (rut == null || dv == null)
                return 0

            var dvr = '0'
            suma = 0
            mul = 2

            for (i = rut.length - 1; i >= 0; i--) {
                suma = suma + rut.charAt(i) * mul
                if (mul == 7)
                    mul = 2
                else
                    mul++
            }
            res = suma % 11
            if (res == 1)
                dvr = 'k'
            else if (res == 0)
                dvr = '0'
            else {
                dvi = 11 - res
                dvr = dvi + ""
            }
            if (dvr != dv.toLowerCase()) {
                $("#idrut_rep").css('border', '2px solid red');
                $('#idrut_rep').val("");
                windows.document.form1.rut.value('');
                return false
            }

            return true
        }

        function Rut(texto) {
            var tmpstr = "";
            for (i = 0; i < texto.length; i++)
                if (texto.charAt(i) != ' ' && texto.charAt(i) != '.' && texto.charAt(i) != '-')
                    tmpstr = tmpstr + texto.charAt(i);
            texto = tmpstr;
            largo = texto.length;

            if (largo < 2) {
                $("#idrut_rep").css('border', '2px solid red');
                $('#idrut_rep').val("");
                windows.document.form1.rut.value('');
                return false
            }

            for (i = 0; i < largo; i++) {
                if (texto.charAt(i) != "0" && texto.charAt(i) != "1" && texto.charAt(i) != "2" && texto.charAt(i) != "3" && texto.charAt(i) != "4" && texto.charAt(i) != "5" && texto.charAt(i) != "6" && texto.charAt(i) != "7" && texto.charAt(i) != "8" && texto.charAt(i) != "9" && texto.charAt(i) != "k" && texto.charAt(i) != "K") {
                    $("#idrut_rep").css('border', '2px solid red');
                    $('#idrut_rep').val("");
                    windows.document.form1.rut.value('');
                    return false
                }
            }

            var invertido = "";
            for (i = (largo - 1), j = 0; i >= 0; i--, j++)
                invertido = invertido + texto.charAt(i);
            var dtexto = "";
            dtexto = dtexto + invertido.charAt(0);
            dtexto = dtexto + '-';
            cnt = 0;

            for (i = 1, j = 2; i < largo; i++, j++) {
                //alert("i=[" + i + "] j=[" + j +"]" );
                if (cnt == 3) {
                    dtexto = dtexto + '.';
                    j++;
                    dtexto = dtexto + invertido.charAt(i);
                    cnt = 1;
                } else {
                    dtexto = dtexto + invertido.charAt(i);
                    cnt++;
                }
            }

            invertido = "";
            for (i = (dtexto.length - 1), j = 0; i >= 0; i--, j++)
                invertido = invertido + dtexto.charAt(i);

            window.document.form1.rut.value = invertido.toUpperCase()

            if (revisarDigito2(texto))
                $("#idrut_rep").css('border', '2px solid green');


            return false;
        }

    </script>
    <script src="https://code.jquery.com/jquery-1.11.3.js"></script>
    <script>
        $(document).on('ready', function () {
            $('#btn_add_rl').click(function () {

                var url = "AddRepresentantesLegales";

                if ($("#idrut_rep").val() == "") {
                    $("#idrut_rep").css('border', '2px solid red');
                    $('#alerta_tab').html("" +
                        "<div class=\"alert alert-warning alert-dismissable\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                        "<h4><i class=\"icon fa fa-info\"></i> Alerta de Sistema!</h4>" +
                        "Campo RUT es Obligatorio.\n" +
                        "</div>");
                    return;
                }

                if ($("#nac_rep").val() == "") {
                    $("#nac_rep").css('border', '2px solid red');
                    $('#alerta_tab').html("" +
                        "<div class=\"alert alert-warning alert-dismissable\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                        "<h4><i class=\"icon fa fa-info\"></i> Alerta de Sistema!</h4>" +
                        "Campo Nacionalidad es Obligatorio.\n" +
                        "</div>");
                    return;
                }

                if ($("#pat_rep").val() == "") {
                    $("#pat_rep").css('border', '2px solid red');
                    $('#alerta_tab').html("" +
                        "<div class=\"alert alert-warning alert-dismissable\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                        "<h4><i class=\"icon fa fa-info\"></i> Alerta de Sistema!</h4>" +
                        "Campo Paterno es Obligatorio.\n" +
                        "</div>");
                    return;
                }

                if ($("#mat_rep").val() == "") {
                    $("#mat_rep").css('border', '2px solid red');
                    $('#alerta_tab').html("" +
                        "<div class=\"alert alert-warning alert-dismissable\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                        "<h4><i class=\"icon fa fa-info\"></i> Alerta de Sistema!</h4>" +
                        "Campo Materno es Obligatorio.\n" +
                        "</div>");
                    return;
                }

                if ($("#nombres_rep").val() == "") {
                    $("#nombres_rep").css('border', '2px solid red');
                    $('#alerta_tab').html("" +
                        "<div class=\"alert alert-warning alert-dismissable\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                        "<h4><i class=\"icon fa fa-info\"></i> Alerta de Sistema!</h4>" +
                        "Campo Nombres es Obligatorio.\n" +
                        "</div>");
                    return;
                }

                if ($("#mail1_rep").val() == "") {
                    $("#mail1_rep").css('border', '2px solid red');
                    $('#alerta_tab').html("" +
                        "<div class=\"alert alert-warning alert-dismissable\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                        "<h4><i class=\"icon fa fa-info\"></i> Alerta de Sistema!</h4>" +
                        "Campo Correo 1 es Obligatorio.\n" +
                        "</div>");
                    return;
                }

                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#form_representantes_legales").serialize(),
                    success: function (data) {
                        if (data == 1) {
                            $('#alerta_tab').html("" +
                                "<div class=\"alert alert-success alert-dismissable\">\n" +
                                "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                                "<h4><i class=\"icon fa fa-check\"></i> Mensaje de Sistema!</h4>" +
                                "Nuevo cliente almacenado con éxito.\n" +
                                "</div>");
                            location.reload();
                        } else if (data == 2) {
                            $('#alerta_tab').html("" +
                                "<div class=\"alert alert-danger alert-dismissable\">\n" +
                                "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                                "<h4><i class=\"icon fa fa-warning\"></i> Alerta de Sistema!</h4>" +
                                "Error, el Representante no puede estar duplicado en la base de datos\n" +
                                "</div>");
                        }
                    },
                    error: function (data) {
                        alert(data);
                        alert('ERROR');
                    }
                });

            });

            $('#btn_add_plan').click(function () {

                var url = "AddPlanIni";

                if ($("#feciniplan").val() == "") {
                    $("#feciniplan").css('border', '2px solid red');
                    $('#alerta_tab2').html("" +
                        "<div class=\"alert alert-warning alert-dismissable\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                        "<h4><i class=\"icon fa fa-info\"></i> Alerta de Sistema!</h4>" +
                        "Campo Fecha Inicio es Obligatorio.\n" +
                        "</div>");
                    return;
                }
                if ($("#fecfinplan").val() == "") {
                    $("#fecfinplan").css('border', '2px solid red');
                    $('#alerta_tab2').html("" +
                        "<div class=\"alert alert-warning alert-dismissable\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                        "<h4><i class=\"icon fa fa-info\"></i> Alerta de Sistema!</h4>" +
                        "Campo Fecha Fin es Obligatorio.\n" +
                        "</div>");
                    return;
                }

                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#form_plan_ini").serialize(),
                    success: function (data) {
                        if (data == 1) {
                            $('#alerta_tab2').html("" +
                                "<div class=\"alert alert-success alert-dismissable\">\n" +
                                "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                                "<h4><i class=\"icon fa fa-check\"></i> Mensaje de Sistema!</h4>" +
                                "Nuevo cliente almacenado con éxito.\n" +
                                "</div>");
                            location.reload();
                        } else if (data == 2) {
                            $('#alerta_tab2').html("" +
                                "<div class=\"alert alert-danger alert-dismissable\">\n" +
                                "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                                "<h4><i class=\"icon fa fa-warning\"></i> Alerta de Sistema!</h4>" +
                                "Error, el Representante no puede estar duplicado en la base de datos\n" +
                                "</div>");
                        }
                    },
                    error: function (data) {
                        alert(data);
                        alert('ERROR');
                    }
                });

            });

            $('#btn_add_fp_tc').click(function () {

                var url = "AddDetallesTC";

                if ($("#idrut_tit").val() == "") {
                    $("#idrut_tit").css('border', '2px solid red');
                    $('#alerta_tab4').html("" +
                        "<div class=\"alert alert-warning alert-dismissable\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                        "<h4><i class=\"icon fa fa-info\"></i> Alerta de Sistema!</h4>" +
                        "Campo Rut Titular es Obligatorio.\n" +
                        "</div>");
                    return;
                }
                if ($("#nom_titular").val() == "") {
                    $("#nom_titular").css('border', '2px solid red');
                    $('#alerta_tab4').html("" +
                        "<div class=\"alert alert-warning alert-dismissable\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                        "<h4><i class=\"icon fa fa-info\"></i> Alerta de Sistema!</h4>" +
                        "Campo Nombre del Titular es Obligatorio.\n" +
                        "</div>");
                    return;
                }
                if ($("#numtc").val() == "") {
                    $("#numtc").css('border', '2px solid red');
                    $('#alerta_tab4').html("" +
                        "<div class=\"alert alert-warning alert-dismissable\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                        "<h4><i class=\"icon fa fa-info\"></i> Alerta de Sistema!</h4>" +
                        "Campo N° Tarjeta es Obligatorio.\n" +
                        "</div>");
                    return;
                }
                if ($("#feccargo").val() == "") {
                    $("#feccargo").css('border', '2px solid red');
                    $('#alerta_tab4').html("" +
                        "<div class=\"alert alert-warning alert-dismissable\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                        "<h4><i class=\"icon fa fa-info\"></i> Alerta de Sistema!</h4>" +
                        "Campo Fecha de Cargo es Obligatorio.\n" +
                        "</div>");
                    return;
                }

                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#form_pag_tc").serialize(),
                    success: function (data) {
                        if (data == 1) {
                            $('#alerta_tab2').html("" +
                                "<div class=\"alert alert-success alert-dismissable\">\n" +
                                "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                                "<h4><i class=\"icon fa fa-check\"></i> Mensaje de Sistema!</h4>" +
                                "Datos de la Tarjeta Añadidos con Éxito.\n" +
                                "</div>");
                            location.reload();
                        } else if (data == 2) {
                            $('#alerta_tab2').html("" +
                                "<div class=\"alert alert-danger alert-dismissable\">\n" +
                                "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                                "<h4><i class=\"icon fa fa-warning\"></i> Alerta de Sistema!</h4>" +
                                "Error, no se puedieron añadir datos de la Tarjeta\n" +
                                "</div>");
                        }
                    },
                    error: function (data) {
                        alert(data);
                        alert('ERROR');
                    }
                });

            });

            $('#btn_add_fp_pac').click(function () {

                var url = "AddDetallesPAC";

                if ($("#idrut_tit2").val() == "") {
                    $("#idrut_tit2").css('border', '2px solid red');
                    $('#alerta_tab3').html("" +
                        "<div class=\"alert alert-warning alert-dismissable\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                        "<h4><i class=\"icon fa fa-info\"></i> Alerta de Sistema!</h4>" +
                        "Campo Rut Titular es Obligatorio.\n" +
                        "</div>");
                    return;
                }
                if ($("#nom_titular2").val() == "") {
                    $("#nom_titular2").css('border', '2px solid red');
                    $('#alerta_tab3').html("" +
                        "<div class=\"alert alert-warning alert-dismissable\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                        "<h4><i class=\"icon fa fa-info\"></i> Alerta de Sistema!</h4>" +
                        "Campo Nombre del Titular es Obligatorio.\n" +
                        "</div>");
                    return;
                }
                if ($("#numcta").val() == "") {
                    $("#numcta").css('border', '2px solid red');
                    $('#alerta_tab3').html("" +
                        "<div class=\"alert alert-warning alert-dismissable\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                        "<h4><i class=\"icon fa fa-info\"></i> Alerta de Sistema!</h4>" +
                        "Campo N° Cuenta es Obligatorio.\n" +
                        "</div>");
                    return;
                }
                if ($("#feccargo2").val() == "") {
                    $("#feccargo2").css('border', '2px solid red');
                    $('#alerta_tab3').html("" +
                        "<div class=\"alert alert-warning alert-dismissable\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                        "<h4><i class=\"icon fa fa-info\"></i> Alerta de Sistema!</h4>" +
                        "Campo Fecha de Cargo es Obligatorio.\n" +
                        "</div>");
                    return;
                }

                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#form_pag_pac").serialize(),
                    success: function (data) {
                        if (data == 1) {
                            $('#alerta_tab3').html("" +
                                "<div class=\"alert alert-success alert-dismissable\">\n" +
                                "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                                "<h4><i class=\"icon fa fa-check\"></i> Mensaje de Sistema!</h4>" +
                                "Datos del Pago Automático de Cuentas añadido con Éxito.\n" +
                                "</div>");
                            location.reload();
                        } else if (data == 2) {
                            $('#alerta_tab3').html("" +
                                "<div class=\"alert alert-danger alert-dismissable\">\n" +
                                "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                                "<h4><i class=\"icon fa fa-warning\"></i> Alerta de Sistema!</h4>" +
                                "Error, no se puedieron añadir datos del pago Automatico de Cuentas\n" +
                                "</div>");
                        }
                    },
                    error: function (data) {
                        alert(data);
                        alert('ERROR');
                    }
                });

            });

            $('#btn_add_contacto').click(function () {

                var url = "AddContacto";

                if ($("#cont_pat").val() == "") {
                    $("#cont_pat").css('border', '2px solid red');
                    $('#alerta_tab5').html("" +
                        "<div class=\"alert alert-warning alert-dismissable\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                        "<h4><i class=\"icon fa fa-info\"></i> Alerta de Sistema!</h4>" +
                        "Campo Paterno es Obligatorio.\n" +
                        "</div>");
                    return;
                }
                if ($("#cont_mat").val() == "") {
                    $("#cont_mat").css('border', '2px solid red');
                    $('#alerta_tab5').html("" +
                        "<div class=\"alert alert-warning alert-dismissable\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                        "<h4><i class=\"icon fa fa-info\"></i> Alerta de Sistema!</h4>" +
                        "Campo Materno es Obligatorio.\n" +
                        "</div>");
                    return;
                }
                if ($("#cont_nombres").val() == "") {
                    $("#cont_nombres").css('border', '2px solid red');
                    $('#alerta_tab5').html("" +
                        "<div class=\"alert alert-warning alert-dismissable\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                        "<h4><i class=\"icon fa fa-info\"></i> Alerta de Sistema!</h4>" +
                        "Campo Nombres es Obligatorio.\n" +
                        "</div>");
                    return;
                }
                if ($("#cont_cel").val() == "") {
                    $("#cont_cel").css('border', '2px solid red');
                    $('#alerta_tab5').html("" +
                        "<div class=\"alert alert-warning alert-dismissable\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                        "<h4><i class=\"icon fa fa-info\"></i> Alerta de Sistema!</h4>" +
                        "Campo Celular es Obligatorio.\n" +
                        "</div>");
                    return;
                }
                if ($("#cont_mail").val() == "") {
                    $("#cont_mail").css('border', '2px solid red');
                    $('#alerta_tab5').html("" +
                        "<div class=\"alert alert-warning alert-dismissable\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                        "<h4><i class=\"icon fa fa-info\"></i> Alerta de Sistema!</h4>" +
                        "Campo Email es Obligatorio.\n" +
                        "</div>");
                    return;
                }

                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#form_contactos").serialize(),
                    success: function (data) {
                        if (data == 1) {
                            $('#alerta_tab3').html("" +
                                "<div class=\"alert alert-success alert-dismissable\">\n" +
                                "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                                "<h4><i class=\"icon fa fa-check\"></i> Mensaje de Sistema!</h4>" +
                                "Datos del Pago Automático de Cuentas añadido con Éxito.\n" +
                                "</div>");
                            location.reload();
                        } else if (data == 2) {
                            $('#alerta_tab3').html("" +
                                "<div class=\"alert alert-danger alert-dismissable\">\n" +
                                "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                                "<h4><i class=\"icon fa fa-warning\"></i> Alerta de Sistema!</h4>" +
                                "Error, no se puedieron añadir datos del pago Automatico de Cuentas\n" +
                                "</div>");
                        }
                    },
                    error: function (data) {
                        alert(data);
                        alert('ERROR');
                    }
                });

            });

            $('#btn_add_contestación').click(function () {

                var url = "AddContestacion";

                if ($("#contestacion").val() == "") {
                    $("#contestacion").css('border', '2px solid red');
                    $('#alerta_tab6').html("" +
                        "<div class=\"alert alert-warning alert-dismissable\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                        "<h4><i class=\"icon fa fa-info\"></i> Alerta de Sistema!</h4>" +
                        "Campo Contestación es Obligatorio.\n" +
                        "</div>");
                    return;
                }

                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#form_contestacion").serialize(),
                    success: function (data) {
                        if (data == 1) {
                            $('#alerta_tab3').html("" +
                                "<div class=\"alert alert-success alert-dismissable\">\n" +
                                "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                                "<h4><i class=\"icon fa fa-check\"></i> Mensaje de Sistema!</h4>" +
                                "Datos del Pago Automático de Cuentas añadido con Éxito.\n" +
                                "</div>");
                            location.reload();
                        } else if (data == 2) {
                            $('#alerta_tab3').html("" +
                                "<div class=\"alert alert-danger alert-dismissable\">\n" +
                                "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                                "<h4><i class=\"icon fa fa-warning\"></i> Alerta de Sistema!</h4>" +
                                "Error, no se puedieron añadir datos del pago Automatico de Cuentas\n" +
                                "</div>");
                        }
                    },
                    error: function (data) {
                        alert(data);
                        alert('ERROR');
                    }
                });

            });

            $('#btn_info_general').click(function () {

                var url = "AddInfoGeneral";

                if ($("#infoextra").val() == "") {
                    $("#infoextra").css('border', '2px solid red');
                    $('#alerta_tab7').html("" +
                        "<div class=\"alert alert-warning alert-dismissable\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                        "<h4><i class=\"icon fa fa-info\"></i> Alerta de Sistema!</h4>" +
                        "Campo Info Extra es Obligatorio.\n" +
                        "</div>");
                    return;
                }

                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#form_infoextra").serialize(),
                    success: function (data) {
                        if (data == 1) {
                            $('#alerta_tab7').html("" +
                                "<div class=\"alert alert-success alert-dismissable\">\n" +
                                "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                                "<h4><i class=\"icon fa fa-check\"></i> Mensaje de Sistema!</h4>" +
                                "Datos del Pago Automático de Cuentas añadido con Éxito.\n" +
                                "</div>");
                            location.reload();
                        } else if (data == 2) {
                            $('#alerta_tab7').html("" +
                                "<div class=\"alert alert-danger alert-dismissable\">\n" +
                                "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                                "<h4><i class=\"icon fa fa-warning\"></i> Alerta de Sistema!</h4>" +
                                "Error, no se puedieron añadir datos del pago Automatico de Cuentas\n" +
                                "</div>");
                        }
                    },
                    error: function (data) {
                        alert(data);
                        alert('ERROR');
                    }
                });

            });
        });
    </script>

@endsection
