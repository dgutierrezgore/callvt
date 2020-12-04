<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Notificación Plataforma VirtualCALL</title>
</head>
<body>


<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td style="padding: 10px 0 30px 0;">
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="600"
                   style="border: 0px solid #cccccc; border-collapse: collapse;">
                <tr>
                    <td align="center"
                        style="padding: 40px 0 30px 0; color: #fffcf9; font-size: 20px; font-weight: bold; font-family: Arial, sans-serif;"
                        colspan="3">
                        <img src="http://virtualcall.cl/img/bannervc.jpg" alt="">
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div>
                            <center>
                                <h1>
                                    AVISO POSTULACIÓN RECIBIDA
                                </h1><br>
                            </center>
                            <p><strong>¡HOLA!, {{ $data['nombre'] }}.</strong> <br><br>
                                Queremos informarte que hemos recibido tu postulación al cargo de vendedor
                                correctamente.
                                <br>
                                <strong>Te contactaremos próximamente para una entrevista</strong>, <br><br>¡Saludos!.
                            </p>
                            <hr>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <h3>
                            DETALLES DE LA POSTULACIÓN
                        </h3>
                    </td>
                </tr>
                <tr>
                    <td><h3>NOMBRE:</h3>
                        <p>{{ $data['nombrecompleto'] }}</p>
                    </td>
                    <td colspan="2"><h3>FONO - CORREO Y COMUNA:</h3>
                        <p>+56 9 {{ $data['fono'] }} - {{ $data['correo'] }} - {{ $data['comuna'] }}</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3"><h3>OBSERVACIONES DEL POSTULANTE:</h3>
                        <p>{{ $data['obs'] }}</p>
                    </td>
                </tr>
                <br><br>
                <tr>
                    <td bgcolor="#FFFFFF" style="padding: 20px 20px 30px 30px;" colspan="3">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td style="color: #001F3F; font-family: Arial, sans-serif; font-size: 14px;"
                                    width="75%">
                                    <center><small><strong>Notificación de Postulaciones</strong></small>
                                    </center>
                                    <center><small>® {{ date('Y') }} Plataforma Interna VTCALLSys.</small></center>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    <tr/>
</table>
</body>
</html>
