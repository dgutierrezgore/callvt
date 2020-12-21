@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Formulario de Registro Cliente
@endsection

@section('contentheader_title')
    Formulario de de Registro Cliente
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
                            Datos Principales del Cliente</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="active tab-pane" id="datos_principales">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Mis Últimos 5 Ingresos</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body no-padding">
                                <table class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <th style="width: 10px">Acción</th>
                                        <th>Rut Cliente</th>
                                        <th>Razón Social</th>
                                    </tr>
                                    @foreach($u_5_c as $listado)
                                        <tr>
                                            <td>
                                                <form action="/ComplementarCliente" method="POST">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="hidden" name="idcli"
                                                           value="{{ $listado->idclientes }}">
                                                    <button class="btn btn-primary btn-xs" type="submit"><i
                                                            class="fa fa-pencil"></i> Complementar
                                                    </button>
                                                </form>
                                            </td>
                                            <td>{{ $listado->rutcliente }}</td>
                                            <td>{{ $listado->razonsoccliente }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
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
        function mayusculas_rs(e) {
            var tecla = e.value;
            $("#rsoc_emp").val(tecla.toUpperCase());
            $("#rsoc_emp").css('border', '2px solid green');
            return;
        }

        function mayusculas_g(e) {
            var tecla = e.value;
            $("#giro_emp").val(tecla.toUpperCase());
            $("#giro_emp").css('border', '2px solid green');
            return;
        }

        function mayusculas_c(e) {
            var tecla = e.value;
            $("#calle_emp").val(tecla.toUpperCase());
            $("#calle_emp").css('border', '2px solid green');
            return;
        }

        function mayusculas_n(e) {
            var tecla = e.value;
            $("#num_call_emp").val(tecla.toUpperCase());
            $("#num_call_emp").css('border', '2px solid green');
            return;
        }

        function mayusculas_b(e) {
            var tecla = e.value;
            $("#block_call_emp").val(tecla.toUpperCase());
            $("#block_call_emp").css('border', '2px solid green');
            return;
        }

        function mayusculas_sw(e) {
            var tecla = e.value;
            $("#web_emp").val(tecla.toUpperCase());
            $("#web_emp").css('border', '2px solid green');
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
                $("#idrut_emp").css('border', '2px solid red');
                $('#idrut_emp').val("");
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
                $("#idrut_emp").css('border', '2px solid red');
                $('#idrut_emp').val("");
                windows.document.form1.rut.value('');
                return false
            }

            for (i = 0; i < largo; i++) {
                if (texto.charAt(i) != "0" && texto.charAt(i) != "1" && texto.charAt(i) != "2" && texto.charAt(i) != "3" && texto.charAt(i) != "4" && texto.charAt(i) != "5" && texto.charAt(i) != "6" && texto.charAt(i) != "7" && texto.charAt(i) != "8" && texto.charAt(i) != "9" && texto.charAt(i) != "k" && texto.charAt(i) != "K") {
                    $("#idrut_emp").css('border', '2px solid red');
                    $('#idrut_emp').val("");
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
                $("#idrut_emp").css('border', '2px solid green');


            return false;
        }

    </script>
    <script src="https://code.jquery.com/jquery-1.11.3.js"></script>
    <script>
        $(document).on('ready', function () {
            $('#btn_crea_empresa').click(function () {

                var url = "RegistrarCliente";

                if ($("#idrut_emp").val() == "") {
                    $("#idrut_emp").css('border', '2px solid red');
                    $('#alerta_tab').html("" +
                        "<div class=\"alert alert-warning alert-dismissable\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                        "<h4><i class=\"icon fa fa-info\"></i> Alerta de Sistema!</h4>" +
                        "Campo RUT es Obligatorio.\n" +
                        "</div>");
                    return;
                }

                if ($("#rsoc_emp").val() == "") {
                    $("#rsoc_emp").css('border', '2px solid red');
                    $('#alerta_tab').html("" +
                        "<div class=\"alert alert-warning alert-dismissable\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                        "<h4><i class=\"icon fa fa-info\"></i> Alerta de Sistema!</h4>" +
                        "Campo Razón Social es Obligatorio.\n" +
                        "</div>");
                    return;
                }

                if ($("#giro_emp").val() == "") {
                    $("#giro_emp").css('border', '2px solid red');
                    $('#alerta_tab').html("" +
                        "<div class=\"alert alert-warning alert-dismissable\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                        "<h4><i class=\"icon fa fa-info\"></i> Alerta de Sistema!</h4>" +
                        "Campo Giro es Obligatorio.\n" +
                        "</div>");
                    return;
                }

                if ($("#calle_emp").val() == "") {
                    $("#calle_emp").css('border', '2px solid red');
                    $('#alerta_tab').html("" +
                        "<div class=\"alert alert-warning alert-dismissable\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                        "<h4><i class=\"icon fa fa-info\"></i> Alerta de Sistema!</h4>" +
                        "Campo Calle es Obligatorio.\n" +
                        "</div>");
                    return;
                }

                if ($("#num_call_emp").val() == "") {
                    $("#num_call_emp").css('border', '2px solid red');
                    $('#alerta_tab').html("" +
                        "<div class=\"alert alert-warning alert-dismissable\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                        "<h4><i class=\"icon fa fa-info\"></i> Alerta de Sistema!</h4>" +
                        "Campo Número es Obligatorio.\n" +
                        "</div>");
                    return;
                }

                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#form_datos_principales").serialize(),
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
                                "Error, el cliente ya existe en la base de datos\n" +
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

