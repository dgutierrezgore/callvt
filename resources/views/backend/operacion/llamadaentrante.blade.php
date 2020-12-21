@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Formulario de Operación
@endsection

@section('contentheader_title')
    Formulario de Operación de Llamadas
@endsection

@section('contentheader_description')
    - Llamada Entrante
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
                    <li class="active"><a href="#inicio" data-toggle="tab"><i class="fa fa-phone"></i>
                            Operación General de Llamadas Entrante</a>
                    </li>
                    <li><a href="#vendedores" data-toggle="tab"><i class="fa fa-users"></i>
                            Vendedores VT CALL</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="active tab-pane" id="inicio">
                        <div class="row">
                            <div class="col-sm-6">
                                <form class="form-horizontal" name="form1" id="form_traeinfo">
                                    <div class="box-body">
                                        <div id="alerta_tab">

                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-3 control-label">FOLIO
                                                INTERNO</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" min="0" id="fonoip"
                                                       name="fonoip" autocomplete="off" required>
                                            </div>
                                            <input type="hidden" id="encontrado" name="encontrado" value="0">
                                            <div class="col-sm-1">
                                                <button type="button" class="btn btn-primary" id="traeinfo">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </form>

                                <div id="contestacion">

                                </div>

                                <div id="infoextra">

                                </div>

                                <div id="contacto">

                                </div>

                                <div id="contacto2">

                                </div>
                                <div id="contacto3">

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <form class="form-horizontal" name="form1" id="form_llamada">
                                    <div class="box-body">
                                        <div id="alerta_tab2">

                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-3 control-label">FONO EXTERNO</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" min="0" id="fonoex"
                                                       name="fonoex" autocomplete="off" required>
                                            </div>
                                            <div id="btn_llamada_ent" class="col-sm-1 " style="display: none;">
                                                <button type="button" class="btn btn-primary" id="traeinfoext">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </form>
                                <hr>

                                <div id="formaddllamada">
                                    <form class="form-horizontal" name="form1" id="form_datos_llamada">
                                        <div class="box-body">
                                            <div id="alerta_tab2">

                                            </div>
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" id="hiddenfonox" name="fonoex">
                                            <input type="hidden" id="hiddenfonocli" name="fonocli">
                                            <input type="hidden" id="hiddenfectoma" name="fectoma">
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-3 control-label">Nombre:</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" min="0" id="nombreex"
                                                           name="nombreex" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-3 control-label">Empresa:</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" min="0" id="empresaex"
                                                           name="empresaex" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-3 control-label">Fono
                                                    Secundario:</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" min="0" id="fonsecex"
                                                           name="fonsecex" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-3 control-label">Correo
                                                    Electrónico:</label>
                                                <div class="col-sm-8">
                                                    <input type="mail" class="form-control" min="0" id="mailex"
                                                           name="mailex" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-3 control-label">Mensaje
                                                    Llamada:</label>
                                                <div class="col-sm-8">
                                                    <textarea class="form-control" id="motiex" name="motiex" rows="2"
                                                              required></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-3 control-label">Acción
                                                    Rápida</label>
                                                <div class="radio col-sm-3">
                                                    <label>
                                                        <input type="checkbox" name="ac1" value="1">
                                                        <i class="fa fa-mobile-phone"></i> Devolver Llamado
                                                    </label>
                                                </div>
                                                <div class="radio col-sm-3">
                                                    <label>
                                                        <input type="checkbox" name="ac2" value="1">
                                                        <i class="fa fa-times"></i> Llamará mas Tarde
                                                    </label>
                                                </div>
                                                <div class="radio col-sm-3">
                                                    <label>
                                                        <input type="checkbox" name="ac3" value="1">
                                                        <i class="fa fa-warning"></i> Urgente
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail3"
                                                       class="col-sm-3 control-label">Derivación</label>
                                                <div class="radio col-sm-3">
                                                    <label>
                                                        <input type="radio" name="deriva" value="1"
                                                               checked="">
                                                        <i class="fa fa-phone"></i> Si, Anexo
                                                    </label>
                                                </div>
                                                <div class="radio col-sm-3">
                                                    <label>
                                                        <input type="radio" name="deriva" value="2">
                                                        <i class="fa fa-mobile-phone"></i> Si, Celular
                                                    </label>
                                                </div>
                                                <div class="radio col-sm-3">
                                                    <label>
                                                        <input type="radio" name="deriva" value="3">
                                                        <i class="fa fa-close"></i> No se deriva
                                                    </label>
                                                </div>
                                            </div>
                                            <div id="btn_dos" class="form-group " style="display: none;">
                                                <button class="btn btn-block btn-sm btn-warning" id="finllamada"
                                                        type="button"><i class="fa fa-flag"></i> FINALIZAR LLAMADA
                                                </button>
                                            </div>
                                        </div>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="vendedores">

                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Grilla de todos los vendedores VirtualCALL habilitados</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="GrillaPrincipal" class="table table-bordered table-hover">
                                                <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Teléfono Celular</th>
                                                    <th>Correo Electrónico</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($vendedores as $listado)
                                                    <tr>
                                                        <td>{{ $listado->nombrevend }}</td>
                                                        <td>+56 9 {{ $listado->celus }}</td>
                                                        <td>{{ $listado->mailpus }}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
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
    </script>
    <script src="https://code.jquery.com/jquery-1.11.3.js"></script>
    <script>
        $(document).on('ready', function () {
            $("form").keypress(function (e) {
                if (e.which == 13) {
                    return false;
                }
            });

            //ACCIONES TECLA ENTER
            $("#form_traeinfo").keypress(function (e) {
                if (e.which == 13) {
                    var url = "TraerCliente";

                    if ($("#fonoip").val() == "") {
                        $("#fonoip").css('border', '2px solid red');
                        $('#alerta_tab').html("" +
                            "<div class=\"alert alert-warning alert-dismissable\">\n" +
                            "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                            "<h4><i class=\"icon fa fa-info\"></i> Alerta de Sistema!</h4>" +
                            "Campo Fono IP es Obligatorio.\n" +
                            "</div>");
                        return;
                    }

                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $("#form_traeinfo").serialize(),
                        success: function (data) {
                            if (data == 2) {
                                $('#alerta_tab').html("" +
                                    "<div class=\"alert alert-danger alert-dismissable\">\n" +
                                    "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                                    "<h4><i class=\"icon fa fa-warning\"></i> Alerta de Sistema!</h4>" +
                                    "No Encontrado\n" +
                                    "</div>").show();
                                $('#contestacion').hide();
                                $('#infoextra').hide();
                                $('#contacto').hide();
                                $('#contacto2').hide();
                                $('#contacto3').hide();
                                $('#btn_llamada_ent').hide();
                                $('#btn_dos').hide();
                                $("#encontrado").val(0);
                            } else {
                                llamada = data[0].fomcontllamada;
                                infoextra = data[0].infoextra;


                                contactos1 = data[0].nombrescont + ' ' + data[0].paternocont + ' ' + data[0].maternocont;
                                contactos1b = data[0].celcont + ' ' + data[0].mailcont;

                                if (data[0].contactosac == 2) {
                                    contactos2 = data[1].nombrescont + ' ' + data[1].paternocont + ' ' + data[1].maternocont;
                                    contactos2b = data[1].celcont + ' ' + data[1].mailcont;
                                } else if (data[0].contactosac == 3) {
                                    contactos2 = data[1].nombrescont + ' ' + data[1].paternocont + ' ' + data[1].maternocont;
                                    contactos2b = data[1].celcont + ' ' + data[1].mailcont;
                                    contactos3 = data[2].nombrescont + ' ' + data[2].paternocont + ' ' + data[2].maternocont;
                                    contactos3b = data[2].celcont + ' ' + data[2].mailcont;
                                }
                                $('#alerta_tab').hide();
                                $('#btn_llamada_ent').show();
                                $('#btn_dos').show();
                                $("#encontrado").val(1);
                                $('#contestacion').html("" +
                                    "<div class=\"alert alert-success\">\n" +
                                    "<h4><i class=\"icon fa fa-bullhorn\"></i> Contestación!</h4>" +
                                    llamada +
                                    "</div>").show();

                                $('#infoextra').html("" +
                                    "<div class=\"alert alert-success\">\n" +
                                    "<h4><i class=\"icon fa fa-spinner\"></i> Información Extra!</h4>" +
                                    infoextra +
                                    "</div>").show();

                                $('#contacto').html("" +
                                    "<div class=\"alert alert-success\">\n" +
                                    "<h4><i class=\"icon fa fa-user\"></i> Contacto 1! Anexo: " + data[0].anex1cont
                                    + "</h4>" +
                                    contactos1 + "<br>" + contactos1b +
                                    "</div>"
                                ).show();
                                if (data[0].contactosac <= 3) {
                                    $('#contacto2').html("" +
                                        "<div class=\"alert alert-success\">\n" +
                                        "<h4><i class=\"icon fa fa-user\"></i> Contacto 2!</h4>" +
                                        contactos2 + "<br>" + contactos2b +
                                        "</div>").show();
                                    $('#contacto3').html("" +
                                        "<div class=\"alert alert-success\">\n" +
                                        "<h4><i class=\"icon fa fa-user\"></i> Contacto 3!</h4>" +
                                        contactos3 + "<br>" + contactos3b +
                                        "</div>").show();
                                }
                            }
                        },
                        error: function (data) {
                            alert(data);
                            alert('ERROR');
                        }
                    });
                }
            });
            $("#form_llamada").keypress(function (e) {
                if (e.which == 13) {
                    if (($("#encontrado").val()) == 0) {
                        return false;
                    } else {
                        var url = "TraerDatosNum";

                        if ($("#fonoex").val() == "") {
                            $("#fonoex").css('border', '2px solid red');
                            $('#alerta_tab2').html("" +
                                "<div class=\"alert alert-warning alert-dismissable\">\n" +
                                "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                                "<h4><i class=\"icon fa fa-info\"></i> Alerta de Sistema!</h4>" +
                                "Campo Fono Externo es Obligatorio.\n" +
                                "</div>");
                            return;
                        }

                        $.ajax({
                            type: "POST",
                            url: url,
                            data: $("#form_llamada").serialize(),
                            success: function (data) {
                                if (data == 2) {
                                    $('#alerta_tab2').html("" +
                                        "<div class=\"alert alert-warning alert-dismissable\">\n" +
                                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                                        "<h4><i class=\"icon fa fa-warning\"></i> Alerta de Sistema!</h4>" +
                                        "No Encontrado en BD, se debe agregar ahora\n" +
                                        "</div>").show();
                                    $("#nombreex").val('');
                                    $("#empresaex").val('');
                                    $("#fonsecex").val('');
                                    $("#mailex").val('');
                                    $('#btn_dos').show();
                                    $("#hiddenfonox").val($("#fonoex").val());
                                    $("#hiddenfonocli").val($("#fonoip").val());
                                    var today = new Date();
                                    var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
                                    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
                                    var dateTime = date + ' ' + time;


                                    $("#hiddenfectoma").val(dateTime); /////////////PENDIENTE
                                } else {
                                    $('#alerta_tab2').html("" +
                                        "<div class=\"alert alert-success alert-dismissable\">\n" +
                                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                                        "<h4><i class=\"icon fa fa-warning\"></i> Mensaje de Sistema!</h4>" +
                                        "Encontrado en BD, puede actualizar campos\n" +
                                        "</div>").show();
                                    $('#btn_dos').show();
                                    $("#hiddenfonox").val($("#fonoex").val());
                                    $("#hiddenfonocli").val($("#fonoip").val());

                                    var today = new Date();
                                    var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
                                    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
                                    var dateTime = date + ' ' + time;


                                    $("#hiddenfectoma").val(dateTime); /////////////PENDIENTE
                                    $("#nombreex").val(data[0].nombreext);
                                    $("#empresaex").val(data[0].empresaext);
                                    $("#fonsecex").val(data[0].fonosecext);
                                    $("#mailex").val(data[0].mailext);
                                }
                            },
                            error: function (data) {
                                alert(data);
                                alert('ERROR');
                            }
                        });
                    }
                }
            });

            //ACCIONES DEL BOTON BUSQUEDA
            $('#traeinfo').click(function () {
            });
            $('#traeinfoext').click(function () {

            });

            //FORMULARIO FINAL
            $('#finllamada').click(function () {
                var url = "FinLLamadaActDatos";

                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#form_datos_llamada").serialize(),
                    success: function (data) {
                        if (data == 1) {
                            $('#alerta_tab2').html("" +
                                "<div class=\"alert alert-success alert-dismissable\">\n" +
                                "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                                "<h4><i class=\"icon fa fa-check\"></i> Mensaje de Sistema!</h4>" +
                                "Almacenado con Éxito.\n" +
                                "</div>");
                            location.reload();
                        } else if (data == 2) {
                            $('#alerta_tab2').html("" +
                                "<div class=\"alert alert-danger alert-dismissable\">\n" +
                                "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>" +
                                "<h4><i class=\"icon fa fa-warning\"></i> Alerta de Sistema!</h4>" +
                                "Error, no se almaceno llamada\n" +
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

