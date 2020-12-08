<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Panel del Vendedor - VTCall System</title>

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
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Panel Vendedor - VTCall Sys.</a>
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
            <a class="nav-link" href="/Ventas">Cerrar Sesión</a>
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
                            Ingresar Visita / Pre-Venta
                        </a>
                    </li>
                </ul>

            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Panel de Ingreso de Visita - VENTA</h1>
                <h3><small>Vendedor: {{ $vendedor->nombrevend }}</small></h3>
            </div>
            <div class="col-md-12 order-md-1">
                <h5 class="mb-3">Información del Cliente</h5>
                <form class="needs-validation" name="form1" action="/GuardarPreVenta" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="idvend" value="{{ $vendedor->idvendedoresvt}}">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="firstName">RUN Cliente / RUT Empresa</label>
                            <input type="text" class="form-control" name="rut" id="idrut_emp"
                                   onfocusout="validaRut(document.form1.rut.value)" autocomplete="off" required>
                            <div class="invalid-feedback">
                                Ingrese RUT Válido
                            </div>
                        </div>
                        <div class="col-md-8 mb-3">
                            <label for="lastName">Nombre, Empresa o Razón Social</label>
                            <input type="text" class="form-control" name="rsocprev" id="rsocprev"
                                   onkeyup="mayusculas_rs(this)" autocomplete="off" required>
                            <div class="invalid-feedback">
                                Ingrese Nombre Válido
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="country">Sector Económico Persona / Empresa</label>
                            <select class="custom-select d-block w-100" id="sec_eco" NAME="sec_eco" required>
                                <option value="">SELECCIONAR...</option>
                                @foreach($sector_eco as $listado)
                                    <option value="{{ $listado->idsececo }}">{{ $listado->sectoreconomico }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Ingrese Sector Económico Válido
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="address">Subsector Económico Empresa / Profesión u Oficio</label>
                            <input type="text" class="form-control" id="subsec" name="subsec"
                                   onkeyup="mayusculas_ss(this)" autocomplete="off" required>
                            <div class="invalid-feedback">
                                Ingrese Sub Sector Válido
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="address">Nombre del Contacto</label>
                            <input type="text" class="form-control" id="nombrecont" name="nombrecont"
                                   onkeyup="mayusculas_nc(this)" autocomplete="off" required>
                            <div class="invalid-feedback">
                                Ingrese un nombre válido
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="address">Correo Electrónico Contacto</label>
                            <input type="email" class="form-control" id="mailcont" name="mailcont"
                                   onkeyup="mayusculas_mc(this)" autocomplete="off" required>
                            <div class="invalid-feedback">
                                Ingrese un correo electrónico válido
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="address">Teléfono Celular Contacto</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">+56 9</span>
                                </div>
                                <input type="number" class="form-control" id="numcel" name="numcel"
                                       max="99999999" min="30000000" autocomplete="off" required>
                                <div class="invalid-feedback" style="width: 100%;">
                                    Ingrese un celular válido
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="country">Ciudad emplazamiento de la Empresa</label>
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
                                <input type="text" class="form-control" id="obspreventa" name="obspreventa"
                                       maxlength="100" onkeyup="mayusculas_obs(this)" autocomplete="off" required>
                                <div class="invalid-feedback" style="width: 100%;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h5 class="mb-3">Representante Legal de la Empresa (Información en Contrato)</h5>
                    <div class="row">
                        <div class="col-md-2 mb-3">
                            <label for="firstName">RUN</label>
                            <input type="text" class="form-control" name="rutemp" id="rutemp"
                                   onfocusout="validaRut_n(document.form1.rutemp.value)" autocomplete="off" required>
                            <div class="invalid-feedback">
                                Ingrese RUT Válido
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="lastName">Apellido Paterno</label>
                            <input type="text" class="form-control" name="apasp" id="patrl"
                                   onkeyup="mayusculas_pa(this)" autocomplete="off" required>
                            <div class="invalid-feedback">
                                Ingrese Nombre Válido
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="lastName">Apellido Materno</label>
                            <input type="text" class="form-control" name="amasp" id="matrl"
                                   onkeyup="mayusculas_ma(this)" autocomplete="off" required>
                            <div class="invalid-feedback">
                                Ingrese Nombre Válido
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="lastName">Nombres</label>
                            <input type="text" class="form-control" name="nomasp" id="nomrl"
                                   onkeyup="mayusculas_no(this)" autocomplete="off" required>
                            <div class="invalid-feedback">
                                Ingrese Nombre Válido
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 mb-3">
                            <label for="address">Nacionalidad</label>
                            <input type="text" class="form-control" id="nacrl" name="nacrl" value="CHILENA"
                                   autocomplete="off" required>
                            <div class="invalid-feedback">
                                Ingrese un correo electrónico válido
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="country">Estado Civil</label>
                            <select class="custom-select d-block w-100" id="ecrl" name="ecrl" required="">
                                <option value="">SELECCIONAR...</option>
                                <option value="1">CASADO</option>
                                <option value="2">SOLTERO</option>
                                <option value="3">VIUDO</option>
                                <option value="4">SEPARADO</option>
                                <option value="5">DIVORCIADO</option>
                            </select>
                            <div class="invalid-feedback">
                                Selecciona comuna válida.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="address">Fono Fijo</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">+56</span>
                                </div>
                                <input type="number" class="form-control" id="fijorl" name="fijorl"
                                       autocomplete="off">
                                <div class="invalid-feedback" style="width: 100%;">
                                    Ingrese un celular válido
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="address">Celular</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">+56 9</span>
                                </div>
                                <input type="number" class="form-control" id="celrl" name="celrl"
                                       max="99999999" min="30000000" autocomplete="off" required>
                                <div class="invalid-feedback" style="width: 100%;">
                                    Ingrese un celular válido
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h5 class="mb-3">Cierre Interes / Negocio</h5>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="country">Plan Ofertado al Cliente</label>
                            <select class="custom-select d-block w-100" id="idplanes" name="idplanes" required>
                                <option value="">SELECCIONAR...</option>
                                @foreach($planes as $listado)
                                    <option value="{{ $listado->idplanes }}">{{ $listado->nombreplan }} -
                                        $ {{ number_format($listado->valorcicloplan, 0, ',', '.') }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="country">[Adicional] Agenda</label>
                            <select class="custom-select d-block w-100" id="idadic1" name="idadic1" required>
                                <option value="">SELECCIONAR...</option>
                                @foreach($adic as $listado)
                                    <option value="{{ $listado->idadicionales }}">{{ $listado->nombreadici }} -
                                        $ {{ number_format($listado->valoradic, 0, ',', '.') }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                            </div>
                        </div>

                        <div class="col-md-2 mb-3">
                            <label for="country">[Adicional] Número Fijo</label>
                            <select class="custom-select d-block w-100" id="idadic2" name="idadic2" required>
                                <option value="">SELECCIONAR...</option>
                                @foreach($adic2 as $listado)
                                    <option value="{{ $listado->idadicionales }}">{{ $listado->nombreadici }} -
                                        $ {{ number_format($listado->valoradic, 0, ',', '.') }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="country">Nivel de Interés del Cliente</label>
                            <select class="custom-select d-block w-100" id="probprev" name="probprev" required>
                                <option value="">SELECCIONAR...</option>
                                <option value="CERRADO">NEGOCIO CERRADO (GENERA CONTRATO)</option>
                                <option value="ALTO">PROBABILIDAD ALTO</option>
                                <option value="MEDIO">PROBABILIDAD MEDIA</option>
                                <option value="BAJO">PROBABILIDAD BAJA</option>
                            </select>
                            <div class="invalid-feedback">
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-warning btn-lg btn-block" type="submit"><i class="fa fa-save"></i> Registrar
                        Pre Venta / Venta
                    </button>
                </form>
                <hr>
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
<script type="text/javascript">

    function validaRut_n(varrut) {
        if (Rut_n(varrut)) {
            document.form1.submit();
        }
    }

    function revisarDigito_n(dvr) {
        dv = dvr + ""
        if (dv != '0' && dv != '1' && dv != '2' && dv != '3' && dv != '4' && dv != '5' && dv != '6' && dv != '7' && dv != '8' && dv != '9' && dv != 'k' && dv != 'K') {
            alert("Debe ingresar un digito verificador valido");
            window.document.form1.rutemp.focus();
            window.document.form1.rutemp.select();
            return false;
        }
        return true;
    }

    function revisarDigito2_n(crut) {
        largo = crut.length;
        if (largo < 2) {
            alert("Debe ingresar el rut completo 2")
            window.document.form1.rutemp.focus();
            window.document.form1.rutemp.select();
            return false;
        }
        if (largo > 2)
            rutemp = crut.substring(0, largo - 1);
        else
            rutemp = crut.charAt(0);
        dv = crut.charAt(largo - 1);
        revisarDigito_n(dv);

        if (rutemp == null || dv == null)
            return 0

        var dvr = '0'
        suma = 0
        mul = 2

        for (i = rutemp.length - 1; i >= 0; i--) {
            suma = suma + rutemp.charAt(i) * mul
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
            $("#rutemp").css('border', '2px solid red');
            $('#rutemp').val("");
            windows.document.form1.rutemp.value('');
            return false
        }

        return true
    }

    function Rut_n(texto) {
        var tmpstr = "";
        for (i = 0; i < texto.length; i++)
            if (texto.charAt(i) != ' ' && texto.charAt(i) != '.' && texto.charAt(i) != '-')
                tmpstr = tmpstr + texto.charAt(i);
        texto = tmpstr;
        largo = texto.length;

        if (largo < 2) {
            $("#rutemp").css('border', '2px solid red');
            $('#rutemp').val("");
            windows.document.form1.rutemp.value('');
            return false
        }

        for (i = 0; i < largo; i++) {
            if (texto.charAt(i) != "0" && texto.charAt(i) != "1" && texto.charAt(i) != "2" && texto.charAt(i) != "3" && texto.charAt(i) != "4" && texto.charAt(i) != "5" && texto.charAt(i) != "6" && texto.charAt(i) != "7" && texto.charAt(i) != "8" && texto.charAt(i) != "9" && texto.charAt(i) != "k" && texto.charAt(i) != "K") {
                $("#idrut_emp").css('border', '2px solid red');
                $('#idrut_emp').val("");
                windows.document.form1.rutemp.value('');
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

        window.document.form1.rutemp.value = invertido.toUpperCase()

        if (revisarDigito2_n(texto))
            $("#rutemp").css('border', '2px solid green');


        return false;
    }

</script>
<script>
    function mayusculas_rs(e) {
        var tecla = e.value;
        $("#rsocprev").val(tecla.toUpperCase());
        $("#rsocprev").css('border', '2px solid green');
        return;
    }

    function mayusculas_ss(e) {
        var tecla = e.value;
        $("#subsec").val(tecla.toUpperCase());
        $("#subsec").css('border', '2px solid green');
        return;
    }

    function mayusculas_nc(e) {
        var tecla = e.value;
        $("#nombrecont").val(tecla.toUpperCase());
        $("#nombrecont").css('border', '2px solid green');
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

    function mayusculas_pa(e) {
        var tecla = e.value;
        $("#patrl").val(tecla.toUpperCase());
        $("#patrl").css('border', '2px solid green');
        return;
    }

    function mayusculas_ma(e) {
        var tecla = e.value;
        $("#matrl").val(tecla.toUpperCase());
        $("#matrl").css('border', '2px solid green');
        return;
    }

    function mayusculas_no(e) {
        var tecla = e.value;
        $("#nomrl").val(tecla.toUpperCase());
        $("#nomrl").css('border', '2px solid green');
        return;
    }


</script>
</body>
</html>
