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
                                    AVISO DE PREVENTA
                                </h1><br>
                            </center>
                            <p><strong>¡HOLA!.</strong> <br><br>
                                La preventa ha sido registrada exitosamente en nuestro sistema.
                                <br>
                                ¡Saludos!.
                            </p>
                            <hr>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <h3>
                            DETALLES DE LA PREVENTA
                        </h3>
                    </td>
                </tr>
                <tr>
                    <td><h3>RAZÓN SOCIAL:</h3>
                        <p>{{ $data['rsocemp'] }}</p>
                    </td>
                    <td><h3>TELÉFONO:</h3>
                        <p>+56 9 {{ $data['telcont'] }}</p>
                    </td>
                    <td><h3>OBS:</h3>
                        <p>{{ $data['obspreventa'] }}</p>
                    </td>
                </tr>
                <br><br>
                <tr>
                    <td bgcolor="#FFFFFF" style="padding: 20px 20px 30px 30px;" colspan="3">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td style="color: #001F3F; font-family: Arial, sans-serif; font-size: 14px;"
                                    width="75%">
                                    <center><small><strong>Notificación de Preventas Vendedor</strong></small>
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
