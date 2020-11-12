@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Creación de Cliente
@endsection

@section('contentheader_title')
    Creación de Cliente
@endsection

@section('contentheader_description')
    - Formulario primario de Registro
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
                <li class="active"><a href="#datos_emp" data-toggle="tab" aria-expanded="false"><i
                            class="fa fa-building"></i>
                        <strong>Datos principales del Cliente</strong></a></li>
            </ul>

            <div class="tab-content">

                <div class="tab-pane active" id="datos_emp">

                    <form class='form-horizontal' action="/GuardarCliente" method="POST" id='formulario_res_ex'
                          enctype="multipart/form-data">
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
                                <label for="inputEmail3" class="col-sm-2 control-label">RUT Empresa</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" min="0" id="rut_emp"
                                           name="rut_emp" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Razón Social</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" min="0" id="rsoc_emp"
                                           name="rsoc_emp" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Giro(s)</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="giro_emp" name="giro_emp" rows="2"
                                              required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Calle</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" min="0" id="calle_emp"
                                           name="calle_emp" required>
                                </div>
                                <label for="inputEmail3" class="col-sm-1 control-label">Número</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" min="0" id="num_call_emp"
                                           name="num_call_emp" required>
                                </div>
                                <label for="inputEmail3" class="col-sm-1 control-label">Block</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" min="0" id="block_call_emp"
                                           name="block_call_emp">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Comuna</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="idcomuna">
                                        @foreach($regioncomuna as $listado)
                                            <option value="{{$listado->idvtcall_comunas}}">{{ $listado->nombreregion }}
                                                - {{ $listado->nombrecomuna }}</option>
                                        @endforeach
                                    </select>
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
                                    <input type="text" class="form-control" min="0" id="fono_emp"
                                           name="fono_emp" required>
                                </div>
                                <label for="inputEmail3" class="col-sm-1 control-label">Sitio Web</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" min="0" id="web_emp"
                                           name="web_emp">
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="reset" class="btn btn-default"><i class="fa fa-eraser"></i> Limpiar Formulario
                            </button>
                            <button type="submit" id="btn-res-ex" class="btn btn-success pull-right"><i
                                    class="fa fa-save"></i> Crear nuevo
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

        function agregar_d_ext2() {
            var agrega = $("#div_select3").html();
            $("#cuerpo_2").append(agrega);
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
