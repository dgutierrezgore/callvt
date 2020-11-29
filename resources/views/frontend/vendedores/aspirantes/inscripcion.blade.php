<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Trabaja con Nosotros - VTCall System</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.5/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Trabaja con Nosotros - VTCall Sys.</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse"
            data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="tel:+56966550512">LLAMAR A SOPORTE TÉCNICO PLATAFORMA</a>
        </li>
    </ul>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="/Ventas">Salir</a>
        </li>
    </ul>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="sidebar-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="/Ventas">
                            <span data-feather="home"></span>
                            Salir <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            <span data-feather="file"></span>
                            Ingresar Solicitud
                        </a>
                    </li>
                </ul>

            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            @if (session('OK'))
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
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Trabaja con Nosotros- Inscripción</h1>
                <h5><small>¡Hola!, Estás en una plataforma de VirtualCALL.</small></h5>
            </div>
            <div class="col-md-12 order-md-1">
                <h5 class="mb-3">Información del Aspirante</h5>
                <form class="needs-validation" name="form1" action="/GuardarAspirante" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="col-md-2 mb-3">
                            <label for="firstName">RUN</label>
                            <input type="text" class="form-control" name="rut" id="idrut_emp"
                                   onfocusout="validaRut(document.form1.rut.value)" autocomplete="off" required>
                            <div class="invalid-feedback">
                                Ingrese RUT Válido
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="lastName">Apellido Paterno</label>
                            <input type="text" class="form-control" name="apasp" id="apasp"
                                   onkeyup="mayusculas_rs(this)" autocomplete="off" required>
                            <div class="invalid-feedback">
                                Ingrese Nombre Válido
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="lastName">Apellido Materno</label>
                            <input type="text" class="form-control" name="amasp" id="amasp"
                                   onkeyup="mayusculas_mat(this)" autocomplete="off" required>
                            <div class="invalid-feedback">
                                Ingrese Nombre Válido
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="lastName">Nombres</label>
                            <input type="text" class="form-control" name="nomasp" id="nomasp"
                                   onkeyup="mayusculas_nom(this)" autocomplete="off" required>
                            <div class="invalid-feedback">
                                Ingrese Nombre Válido
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 mb-3">
                            <label for="country">Fecha de Nacimiento</label>
                            <input type="date" class="form-control" id="fecnacasp" name="fecnacasp"
                                   autocomplete="off" required>
                            <div class="invalid-feedback">
                                Ingrese Experiencia en Ventas
                            </div>
                        </div>

                        <div class="col-md-2 mb-3">
                            <label for="country">Nivel de Estudios</label>
                            <select class="custom-select d-block w-100" id="nivelest" name="nivelest" required="">
                                <option value="">SELECCIONAR...</option>
                                <option value="1">ENS. MEDIA COMPLETA</option>
                                <option value="2">TÉCNICO COMPLETO</option>
                                <option value="3">TÉCNICO INCOMPLETO</option>
                                <option value="4">PROFESIONAL COMPLETO</option>
                                <option value="5">PROFESIONAL INCOMPLETO</option>
                            </select>
                            <div class="invalid-feedback">
                                Selecciona comuna válida.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="address">Correo Electrónico</label>
                            <input type="email" class="form-control" id="mailcont" name="mailcont"
                                   onkeyup="mayusculas_mc(this)" autocomplete="off" required>
                            <div class="invalid-feedback">
                                Ingrese un correo electrónico válido
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="address">Teléfono Celular</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">+56 9</span>
                                </div>
                                <input type="number" class="form-control" id="numcel" name="numcel"
                                       max="99999999" min="3000000" autocomplete="off" required>
                                <div class="invalid-feedback" style="width: 100%;">
                                    Ingrese un celular válido
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2 mb-3">
                            <label for="address">ReIngresa Teléfono Celular</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">+56 9</span>
                                </div>
                                <input type="number" class="form-control" id="bloquear" name="numcelver"
                                       max="99999999" min="3000000" autocomplete="off" required>
                                <div class="invalid-feedback" style="width: 100%;">
                                    Ingrese un celular válido
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="country">Comuna / Región de Residencia</label>
                            <select class="custom-select d-block w-100" id="comunaprev" name="comunaprev" required="">
                                <option value="">SELECCIONAR...</option>
                                @foreach($comunas as $listado)
                                    <option value="{{ $listado->idvtcall_comunas }}">{{ $listado->nombrecomuna }}
                                        , REGIÓN {{ $listado->nombreregion }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Selecciona comuna válida.
                            </div>
                        </div>

                        <div class="col-md-7 mb-3">
                            <label for="address">Observaciones</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="obspreventa" name="obsasp"
                                       maxlength="100" onkeyup="mayusculas_obs(this)" autocomplete="off" required>
                                <div class="invalid-feedback" style="width: 100%;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <h4 class="mb-3">¡Gracias por tu interés en trabajar con nosotros!, te contactaremos.</h4>
                    <hr>
                    <br><br>
                    <button class="btn btn-warning btn-lg btn-block" type="submit"><i class="fa fa-rocket"></i> Postular
                    </button>
                </form>
                <hr>
                <br><br>
                <center><small>VTCallSys V.01-C- Desarrolla <a href="mailto:contacto@danielgutierrez.cl">Daniel E.
                            Gutiérrez Fariña</a></small>
                </center>
            </div>
        </main>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
<script src="css/dashboard.js"></script>
<script src="https://code.jquery.com/jquery-1.11.3.js"></script>
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
<script>
    $(document).ready(function () {
        $("#bloquear").on('paste', function (e) {
            e.preventDefault();
        })

        $("#bloquear").on('copy', function (e) {
            e.preventDefault();
        })

        $("#numcel").on('change', function (e) {
            $("#bloquear").val('');
        })

        $("#bloquear").on('focusout', function (e) {
            if ($("#bloquear").val() == $("#numcel").val()) {
                $("#bloquear").css('border', '2px solid green');
                $("#numcel").css('border', '2px solid green');
            } else {
                $("#bloquear").val('');
            }
        })
    })

    function mayusculas_rs(e) {
        var tecla = e.value;
        $("#apasp").val(tecla.toUpperCase());
        $("#apasp").css('border', '2px solid green');
        return;
    }

    function mayusculas_mat(e) {
        var tecla = e.value;
        $("#amasp").val(tecla.toUpperCase());
        $("#amasp").css('border', '2px solid green');
        return;
    }

    function mayusculas_nom(e) {
        var tecla = e.value;
        $("#nomasp").val(tecla.toUpperCase());
        $("#nomasp").css('border', '2px solid green');
        return;
    }

    function mayusculas_mc(e) {
        var tecla = e.value;
        $("#mailcont").val(tecla.toUpperCase());
        $("#mailcont").css('border', '2px solid green');
        return;
    }

    function mayusculas_obs(e) {
        var tecla = e.value;
        $("#obspreventa").val(tecla.toUpperCase());
        $("#obspreventa").css('border', '2px solid green');
        return;
    }
</script>
</body>
</html>
