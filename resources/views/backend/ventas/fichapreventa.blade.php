@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Ficha de Preventa
@endsection

@section('contentheader_title')
    Ficha de Preventa
@endsection

@section('contentheader_description')
    - Formulario de Datos
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
                    <li class="active"><a href="#datos_principales" data-toggle="tab"><i class="fa fa-user"></i>
                            Datos de Preventa</a>
                    </li>
                    <li class=""><a href="#info_a" data-toggle="tab"><i
                                class="fa fa-dollar"></i>
                            Detalles 1° Plan</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="active tab-pane" id="datos_principales">
                        <h4>Esta información fue ingresada en Preventa</h4>

                        <div class="box box-warning">
                            <form class="form-horizontal" action="/ConfirmarDatosPreventa" method="post">
                                <div class="box-body">

                                    <div id="alerta_tab">

                                    </div>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="idprev" value="{{ $fic_prev->idpreventas }}">

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">RUT</label>
                                        <div class="col-sm-2">
                                            <input class="form-control" type="text"
                                                   value="{{ $fic_prev->rutprev }}" readonly>
                                        </div>

                                        <label for="inputEmail3" class="col-sm-1 control-label">Razón Social</label>
                                        <div class="col-sm-5">
                                            <input class="form-control" type="text" name="rsocemp"
                                                   value="{{ $fic_prev->razonsocprev }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Correo</label>
                                        <div class="col-sm-4">
                                            <input class="form-control" name="mail" id="mail" type="text"
                                                   value="{{ $fic_prev->mailcontprev }}">
                                        </div>

                                        <label for="inputEmail3" class="col-sm-1 control-label">Celular +56 9</label>
                                        <div class="col-sm-3">
                                            <input class="form-control" name="celular" id="celular" type="text"
                                                   value="{{ $fic_prev->celularprev }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">RUT Rep. Legal</label>
                                        <div class="col-sm-2">
                                            <input class="form-control" type="text"
                                                   value="{{ $fic_prev->runrepleg }}" readonly>
                                        </div>

                                        <label for="inputEmail3" class="col-sm-1 control-label">Paterno</label>
                                        <div class="col-sm-2">
                                            <input class="form-control" name="apat" id="apat" type="text"
                                                   value="{{ $fic_prev->patrepleg }}">
                                        </div>

                                        <label for="inputEmail3" class="col-sm-1 control-label">Materno</label>
                                        <div class="col-sm-2">
                                            <input class="form-control" name="amat" id="amat" type="text"
                                                   value="{{ $fic_prev->matrepleg }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Nombres</label>
                                        <div class="col-sm-4">
                                            <input class="form-control" name="nombres" id="nombres" type="text"
                                                   value="{{ $fic_prev->nomrepleg }}">
                                        </div>
                                    </div>

                                </div>

                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="reset" class="btn btn-default"><i class="fa fa-eraser"></i>
                                        Limpiar
                                        Formulario
                                    </button>
                                    @if($fic_prev->estadopreve==1)
                                        <button type="submit" class="btn btn-success pull-right">
                                            <i
                                                class="fa fa-save"></i>
                                            Confirmar Información
                                        </button>
                                    @else
                                        <button type="submit" class="btn btn-success pull-right" disabled>
                                            <i
                                                class="fa fa-save"></i>
                                            Información Confirmada
                                        </button>
                                    @endif
                                </div>
                                <!-- /.box-footer -->
                            </form>
                        </div>
                    </div>

                    <div class="tab-pane" id="info_a">
                        <h4>Esta información fue ingresada en Preventa</h4>

                        <div class="box-body">
                            <strong><i class="fa fa-dollar margin-r-5"></i> 1° Plan
                            </strong>

                            <p class="text-muted">
                                <br>
                                {{ $fic_prev->nombreplan }} - $ {{ $fic_prev->valorcicloplan }}
                            </p>

                            <hr>

                            <strong><i class="fa fa-money margin-r-5"></i> 1° Plan - Anexos
                            </strong>

                            <p class="text-muted">
                                <br>
                                @foreach($anex_plan as $listado)
                                    {{ $listado->nombreadici }} - $ {{ $listado->valoradic }}<br>
                                @endforeach
                            </p>

                            <hr>

                            <strong><i class="fa fa-location-arrow margin-r-5"></i> Comuna</strong>

                            <p class="text-muted">
                                <br>
                                {{ $fic_prev->nombrecomuna }}
                            </p>

                            <hr>

                            <strong><i class="fa fa-user margin-r-5"></i> Vendedor</strong>

                            <p class="text-muted">
                                <br>
                                {{ $fic_prev->nombrevend }}
                            </p>
                        </div>
                        <form class="form-horizontal" method="post" action="/VentaCliente">
                            <div class="box-body">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="idprev" value="{{ $fic_prev->idpreventas }}">
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-success btn-xs pull-left"
                                        id="btn_add_rl">
                                    <i
                                        class="fa fa-save"></i>
                                    Confirmar Información y Convertir en Cliente
                                </button>
                            </div>
                        </form>
                        <form class="form-horizontal" method="post" action="/EliminarPreventa">
                            <div class="box-body">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="idprev" value="{{ $fic_prev->idpreventas }}">
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-warning btn-xs pull-left"
                                        id="btn_add_rl">
                                    <i
                                        class="fa fa-save"></i>
                                    Descartar Preventa
                                </button>
                            </div>
                        </form>
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

                    <center><img src="https://adminlte.io/themes/AdminLTE/dist/img/user2-160x160.jpg"
                                 class="img-circle"
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
            $('#btn_add_rlc1').click(function () {

                var url = "AddContratoUS";

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
                    data: $("#form_contrato").serialize(),
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
