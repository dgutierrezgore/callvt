<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Login Oficina VTCALL System</title>
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico"/>
    <link href="/css/login.css" rel="stylesheet" type="text/css"/>


</head>

<body>

<div id="contenedor">

    <br><br><br>
    <h2><strong>VTCALL System</strong> <small>V.01</small></h2>
    <br>
    <hr>
    <br>
    <div class="box">
        <br><br>
        <div class="gris">
            <span id="t1" style="margin-bottom: 10px">INGRESA TUS DATOS PARA RECUPERAR CONTRASEÑA</span>

            <form action="{{ url('password/email') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form1">
                    <label class="lab1">
                        Correo<br/>
                        <span>Electrónico</span>
                    </label>
                    <input type="email" class="inp1" data-val="true"
                           placeholder="" name="email"/>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form1">
                            <input id="iniciar" style="cursor:pointer" name="" type="submit" value="RECUPERAR CONTRASEÑA">
                        </div>
                    </div><!-- /.col -->
                </div>
            </form>
        </div>
        <!-- gris -->


        <div class="box2 gris izq">
                <span>
                    Si no posees cuenta<br/>
                    Solicítala al Administrador.
                </span>
        </div>

        <div class="box2 gris der">
                <span>
                    Acceder al Sistema<br/>
                    <a href="/login" id="btnRecoverPassword">Iniciar Sesión » </a>
                </span>
        </div>

    </div>
    <br><br>
    <div class="box green">
        <br>
        <center><img src="https://www.chacodiapordia.com/wp-content/uploads/2017/07/call-center.jpg" width="380" alt="">
        </center>

    </div>
    <div class="clear"></div>

    <div id="footer"><br><br>
        <img id="cnca-footer"
             src="/img/logovtcall.png" alt="CNCA"/>

        <p>
            <a href="http://www.gorebiobio.cl/" target="_blank">VT Call System SpA.</a><br/>
            XXXX, Concepción.<br/>
            Contacto: <a href="mailto:xxx@xxx.cl">xxx@xxx.xx - Anexo: xxx</a><br/>
            <span style="display:block"><small>V. UI /dgf 0.001-alpha</small></span>
        </p><br>


    </div>

</div>
<!-- contenedor -->


</body>
</html>

