@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Formulario de Registro Usuario Sistema
@endsection

@section('contentheader_title')
    Formulario de Registro Usuario Sistema
@endsection

@section('contentheader_description')
    - Usuario Nuevo
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
                    <li class="active"><a href="#datos_principales" data-toggle="tab"><i class="fa fa-user-plus"></i>
                            Datos Principales del Usuario</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="active tab-pane" id="datos_principales">

                        <form class="form-horizontal" name="form1" id="form_datos_principales">
                            <div class="box-body">
                                <div id="alerta_tab">

                                </div>

                                <a href="/Aspirantes"> Regresar a listado de Aspirantes</a>
                                <br><br>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-1 control-label">RUN</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" min="0" id="idrut_emp"
                                               name="rut" onfocusout="validaRut(document.form1.rut.value)"
                                               value="{{ $info_asp->rutasp }}"
                                               required>
                                    </div>

                                    <label for="inputEmail3" class="col-sm-1 control-label">A. Paterno</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" min="0" id="user_paterno"
                                               name="user_paterno" value="{{ $info_asp->appaternoasp }}"
                                               onkeyup="my_pat(this)" required>
                                    </div>

                                    <label for="inputEmail3" class="col-sm-1 control-label">A. Materno</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" min="0" id="user_materno"
                                               name="user_materno" value="{{ $info_asp->apmaternoasp }}"
                                               onkeyup="my_mat(this)" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-1 control-label">Nombres</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" min="0" id="user_nombres"
                                               name="user_nombres" value="{{ $info_asp->nombresasp }}"
                                               onkeyup="my_nombres(this)" required>
                                    </div>
                                    <label for="inputEmail3" class="col-sm-1 control-label">Nacionalidad</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" min="0" id="user_nacionalidad"
                                               name="user_nacionalidad" value="CHILENA" onkeyup="mayusculas_x(this)"
                                               required>
                                    </div>
                                    <label for="inputEmail3" class="col-sm-1 control-label">Fec. Nacimiento</label>
                                    <div class="col-sm-2">
                                        <input type="date" class="form-control" min="0" id="user_fecnac"
                                               name="user_fecnac" value="{{ $info_asp->fecnacasp  }}"
                                               onkeyup="mayusculas_x(this)" required>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-1 control-label">Estado Civil</label>
                                    <div class="col-sm-3">
                                        <select class="form-control" name="user_ecivil" id="user_ecivil">
                                            <option value="CASADO/A">CASADO/A</option>
                                            <option value="SOLTERO/A">SOLTERO/A</option>
                                            <option value="DIVORCIADO/A">DIVORCIADO/A</option>
                                            <option value="SEPARADO/A">SEPARADO/A</option>
                                            <option value="VIUDO/A">VIUDO/A</option>
                                        </select>
                                    </div>
                                    <label for="inputEmail3" class="col-sm-1 control-label">Profesión</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" min="0" id="user_prof"
                                               name="user_prof" onkeyup="my_prof(this)" required>
                                    </div>
                                    <label for="inputEmail3" class="col-sm-1 control-label">Oficio</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" min="0" id="user_ofic"
                                               name="user_ofic" onkeyup="my_ofic(this)" required>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-1 control-label">Calle</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" min="0" id="user_calle"
                                               name="user_calle" onkeyup="my_calle(this)" required>
                                    </div>
                                    <label for="inputEmail3" class="col-sm-1 control-label">Número</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" min="0" id="user_num"
                                               name="user_num"
                                               onkeyup="mayusculas_x(this)" required>
                                    </div>
                                    <label for="inputEmail3" class="col-sm-1 control-label">Block/Casa</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" min="0" id="user_block"
                                               name="user_block" onkeyup="my_block(this)">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-1 control-label">Villa</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" min="0" id="user_villa"
                                               name="user_villa" onkeyup="my_villa(this)" required>
                                    </div>
                                    <label for="inputEmail3" class="col-sm-1 control-label">Comuna</label>
                                    <div class="col-sm-3">
                                        <select class="form-control" name="idcomuna">
                                            @foreach($regioncomuna as $listado)
                                                <option
                                                    value="{{$listado->idvtcall_comunas}}">{{ $listado->nombrecomuna }}
                                                    - REGIÓN {{ $listado->nombreregion }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-1 control-label">Fono Fijo</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" min="0" id="user_ffijo"
                                               name="user_ffijo" onkeyup="mayusculas_x(this)" required>
                                    </div>
                                    <label for="inputEmail3" class="col-sm-1 control-label">Celular (+56 9)</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" min="0" id="user_cel"
                                               name="user_cel" value="{{ $info_asp->celularasp }}"
                                               onkeyup="mayusculas_x(this)" required>
                                    </div>
                                    <label for="inputEmail3" class="col-sm-1 control-label">Mail Personal</label>
                                    <div class="col-sm-4">
                                        <input type="email" class="form-control" min="0" id="user_mailp"
                                               name="user_mailp" onkeyup="my_mail(this)"
                                               value="{{ $info_asp->correoasp }}" required>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="tform" value="EXT_0120">
                            <input type="hidden" name="idasp" value="{{ $info_asp->idaspirantesvend }}">
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="reset" class="btn btn-default"><i class="fa fa-eraser"></i>
                                    Limpiar
                                    Formulario
                                </button>

                                <button type="button" class="btn btn-success pull-right"
                                        id="btn_crea_usuario">
                                    <i
                                        class="fa fa-save"></i>
                                    Crear Nuevo Usuario
                                </button>

                            </div>
                            <!-- /.box-footer -->
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
        function my_pat(e) {
            var tecla = e.value;
            $("#user_paterno").val(tecla.toUpperCase());
            $("#user_paterno").css('border', '2px solid green');
            return;
        }

        function my_mat(e) {
            var tecla = e.value;
            $("#user_materno").val(tecla.toUpperCase());
            $("#user_materno").css('border', '2px solid green');
            return;
        }

        function my_nombres(e) {
            var tecla = e.value;
            $("#user_nombres").val(tecla.toUpperCase());
            $("#user_nombres").css('border', '2px solid green');
            return;
        }

        function my_prof(e) {
            var tecla = e.value;
            $("#user_prof").val(tecla.toUpperCase());
            $("#user_prof").css('border', '2px solid green');
            return;
        }

        function my_ofic(e) {
            var tecla = e.value;
            $("#user_ofic").val(tecla.toUpperCase());
            $("#user_ofic").css('border', '2px solid green');
            return;
        }

        function my_calle(e) {
            var tecla = e.value;
            $("#user_calle").val(tecla.toUpperCase());
            $("#user_calle").css('border', '2px solid green');
            return;
        }

        function my_block(e) {
            var tecla = e.value;
            $("#user_block").val(tecla.toUpperCase());
            $("#user_block").css('border', '2px solid green');
            return;
        }

        function my_villa(e) {
            var tecla = e.value;
            $("#user_villa").val(tecla.toUpperCase());
            $("#user_villa").css('border', '2px solid green');
            return;
        }

        function my_mail(e) {
            var tecla = e.value;
            $("#user_mailp").val(tecla.toUpperCase());
            $("#user_mailp").css('border', '2px solid green');
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
            $('#btn_crea_usuario').click(function () {

                var url = "RegistrarUsuario";

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

                if ($("#user_paterno").val() == "") {
                    $("#user_paterno").css('border', '2px solid red');
                    $('#alerta_tab').html("" +
                        "<div class=\"alert alert-warning alert-dismissable\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                        "<h4><i class=\"icon fa fa-info\"></i> Alerta de Sistema!</h4>" +
                        "Campo Apellido Paterno es Obligatorio.\n" +
                        "</div>");
                    return;
                }

                if ($("#user_materno").val() == "") {
                    $("#user_materno").css('border', '2px solid red');
                    $('#alerta_tab').html("" +
                        "<div class=\"alert alert-warning alert-dismissable\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                        "<h4><i class=\"icon fa fa-info\"></i> Alerta de Sistema!</h4>" +
                        "Campo Apellido Materno es Obligatorio.\n" +
                        "</div>");
                    return;
                }

                if ($("#user_nombres").val() == "") {
                    $("#user_nombres").css('border', '2px solid red');
                    $('#alerta_tab').html("" +
                        "<div class=\"alert alert-warning alert-dismissable\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                        "<h4><i class=\"icon fa fa-info\"></i> Alerta de Sistema!</h4>" +
                        "Campo Nombre es Obligatorio.\n" +
                        "</div>");
                    return;
                }

                if ($("#user_fecnac").val() == "") {
                    $("#user_fecnac").css('border', '2px solid red');
                    $('#alerta_tab').html("" +
                        "<div class=\"alert alert-warning alert-dismissable\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                        "<h4><i class=\"icon fa fa-info\"></i> Alerta de Sistema!</h4>" +
                        "Campo Fecha de Nacimiento es Obligatorio.\n" +
                        "</div>");
                    return;
                }

                if ($("#user_prof").val() == "") {
                    $("#user_prof").css('border', '2px solid red');
                    $('#alerta_tab').html("" +
                        "<div class=\"alert alert-warning alert-dismissable\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                        "<h4><i class=\"icon fa fa-info\"></i> Alerta de Sistema!</h4>" +
                        "Campo Profesión es Obligatorio.\n" +
                        "</div>");
                    return;
                }

                if ($("#user_ofic").val() == "") {
                    $("#user_ofic").css('border', '2px solid red');
                    $('#alerta_tab').html("" +
                        "<div class=\"alert alert-warning alert-dismissable\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                        "<h4><i class=\"icon fa fa-info\"></i> Alerta de Sistema!</h4>" +
                        "Campo Oficio es Obligatorio.\n" +
                        "</div>");
                    return;
                }

                if ($("#user_calle").val() == "") {
                    $("#user_calle").css('border', '2px solid red');
                    $('#alerta_tab').html("" +
                        "<div class=\"alert alert-warning alert-dismissable\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                        "<h4><i class=\"icon fa fa-info\"></i> Alerta de Sistema!</h4>" +
                        "Campo Calle es Obligatorio.\n" +
                        "</div>");
                    return;
                }

                if ($("#user_villa").val() == "") {
                    $("#user_villa").css('border', '2px solid red');
                    $('#alerta_tab').html("" +
                        "<div class=\"alert alert-warning alert-dismissable\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                        "<h4><i class=\"icon fa fa-info\"></i> Alerta de Sistema!</h4>" +
                        "Campo Villa es Obligatorio.\n" +
                        "</div>");
                    return;
                }

                if ($("#user_cel").val() == "") {
                    $("#user_cel").css('border', '2px solid red');
                    $('#alerta_tab').html("" +
                        "<div class=\"alert alert-warning alert-dismissable\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                        "<h4><i class=\"icon fa fa-info\"></i> Alerta de Sistema!</h4>" +
                        "Campo Celular es Obligatorio.\n" +
                        "</div>");
                    return;
                }

                if ($("#user_mailp").val() == "") {
                    $("#user_mailp").css('border', '2px solid red');
                    $('#alerta_tab').html("" +
                        "<div class=\"alert alert-warning alert-dismissable\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                        "<h4><i class=\"icon fa fa-info\"></i> Alerta de Sistema!</h4>" +
                        "Campo Mail Personal es Obligatorio.\n" +
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
                                "Nuevo Usuario almacenado con éxito.\n" +
                                "</div>");
                            location.reload();
                        } else if (data == 2) {
                            $('#alerta_tab').html("" +
                                "<div class=\"alert alert-danger alert-dismissable\">\n" +
                                "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                                "<h4><i class=\"icon fa fa-warning\"></i> Alerta de Sistema!</h4>" +
                                "Error, el Usuario ya existe en la base de datos\n" +
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

