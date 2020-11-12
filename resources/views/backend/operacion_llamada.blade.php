@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Operación Llamada
@endsection

@section('contentheader_title')
    Operacion Llamada
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
                <li class=""><a href="#registro_llamada" data-toggle="tab" aria-expanded="false"><i
                            class="fa fa-building"></i>
                        <strong>Registro Llamada</strong></a></li>
            </ul>

            <div class="tab-content">

                <div class="tab-pane active" id="inicio">
                    Hola!
                </div>

                <div class="tab-pane" id="registro_llamada">

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
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" min="0" id="anniodocint"
                                           name="anniodocint">
                                </div>
                                <div class="col-sm-2">
                                    <button type="button" id="" class="btn btn-primary"
                                            onclick="agregar_d_int();"><i class="fa fa-plus"></i> Ver Datos
                                    </button>
                                </div>
                                <label for="inputEmail3" class="col-sm-1 control-label">Entrante</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" min="0" id="anniodocint"
                                           name="anniodocint">
                                </div>
                                <div class="col-sm-2">
                                    <button type="button" id="" class="btn btn-warning"
                                            onclick="agregar_d_ext();"><i class="fa fa-plus"></i> Ver Datos
                                    </button>
                                </div>
                            </div>

                            <div class="form-group">

                            </div>
                            <hr>
                            <div id="div_macro_1">
                                <div id="cuerpo_1">
                                </div>
                            </div>

                            <div id="div_macro_2">
                                <div id="cuerpo_2">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Mensaje</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="matbitdocint" name="matbitdocint" rows="4"
                                              required
                                              onkeyup="eventos_materias(this)"></textarea>
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Opciones</label>
                                <div class="col-sm-9">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Devolver Llamado
                                        </label>

                                        <label>
                                            <input type="checkbox"> Llamará mas tarde
                                        </label>

                                        <label>
                                            <input type="checkbox"> Urgente
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="reset" class="btn btn-default"><i class="fa fa-eraser"></i> Limpiar
                                Formulario
                            </button>
                            <button type="submit" id="btn-res-ex" class="btn btn-success pull-right"><i
                                    class="fa fa-save"></i> Guardar Información y Cerrar Llamada
                            </button>
                        </div>
                    </form>


                </div>
            </div>


        </div>


    </div>

    <div style="display: none;" id="div_distrib_int">
        <div id="div_select1">
            <center><h4><strong>Empresa: Proquimica y Minera SpA</strong></h4></center>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label"><strong><i class="fa fa-map"></i>
                        Dirección</strong></label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" min="0" id="anniodocint"
                           name="anniodocint" value="Av. Prat 2203" readonly>
                </div>
                <label for="inputEmail3" class="col-sm-2 control-label"><strong><i class="fa fa-map-pin"></i>
                        Ciudad</strong></label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" min="0" value="Concepción" id="anniodocint"
                           name="anniodocint" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label"><strong><i class="fa fa-user"></i>
                        Contacto 1</strong></label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" min="0" id="anniodocint"
                           name="anniodocint" value="Carlos Manuel Esparza" readonly>
                </div>
                <label for="inputEmail3" class="col-sm-2 control-label"><strong><i class="fa fa-phone"></i>
                        Anexo</strong></label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" min="0" value="2350498" id="anniodocint"
                           name="anniodocint" readonly>
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label"><strong><i class="fa fa-bullhorn"></i>
                        Contestación</strong></label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" min="0" value="Buenos días, se ha comunicado con la empresa XXX" id="anniodocint"
                           name="anniodocint" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label"><strong><i class="fa fa-mobile-phone"></i>
                        Celular</strong></label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" min="0" id="anniodocint"
                           name="anniodocint" value="9 3513 7484" readonly>
                </div>
                <label for="inputEmail3" class="col-sm-2 control-label"><strong><i class="fa fa-mail-forward"></i>
                        Correo Electrónico</strong></label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" min="0" value="cesparza@proquimich.cl" id="anniodocint"
                           name="anniodocint" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label"><strong><i class="fa fa-user"></i>
                        Contacto 2</strong></label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" min="0" id="anniodocint"
                           name="anniodocint" value="Gabriel Pardo Gutiérrez" readonly>
                </div>
                <label for="inputEmail3" class="col-sm-2 control-label"><strong><i class="fa fa-phone"></i>
                        Anexo</strong></label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" min="0" value="2350498" id="anniodocint"
                           name="anniodocint" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label"><strong><i class="fa fa-mobile-phone"></i>
                        Celular</strong></label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" min="0" id="anniodocint"
                           name="anniodocint" value="9 3513 7484" readonly>
                </div>
                <label for="inputEmail3" class="col-sm-2 control-label"><strong><i class="fa fa-mail-forward"></i>
                        Correo Electrónico</strong></label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" min="0" value="gpardo@proquimich.cl" id="anniodocint"
                           name="anniodocint" readonly>
                </div>
            </div>
            <hr>
        </div>
    </div>

    <div style="display: none;" id="div_distrib_ext">
        <div id="div_select2">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label"><strong><i class="fa fa-user"></i>
                        Nombre</strong></label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" min="0" id="anniodocint"
                           name="anniodocint">
                </div>
                <label for="inputEmail3" class="col-sm-2 control-label"><strong><i class="fa fa-phone-square"></i>
                        Fono Dev. Llamado</strong></label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" min="0" id="anniodocint"
                           name="anniodocint">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label"><strong><i class="fa fa-edit"></i>
                        Motivo</strong></label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" min="0" id="anniodocint"
                           name="anniodocint">
                </div>
                <label for="inputEmail3" class="col-sm-2 control-label"><strong><i class="fa fa-mail-forward"></i>
                        Correo Electrónico</strong></label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" min="0" id="anniodocint"
                           name="anniodocint">
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
