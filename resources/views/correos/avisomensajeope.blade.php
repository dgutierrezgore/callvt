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
                        style="padding: 40px 0 30px 0; color: #1f1f1f; font-size: 20px; font-weight: bold; font-family: Arial, sans-serif;"
                        colspan="3">
                        <img src="http://virtualcall.cl/img/bannervc.jpg" alt="">
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div>
                            <center>
                                <h1>
                                    AVISO MENSAJE RECIBIDO POR OPERADORA
                                </h1><br>
                            </center>
                            <p><strong>¡HOLA!, {{ $data['nombre_cli'] }}.</strong> <br><br>
                                Queremos informarte que hemos recibido un llamado a la línea contratada y hemos tomado
                                el recado para tí.
                            </p>
                            <hr>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <h3>
                            DETALLE DE LA LLAMADA
                        </h3>
                    </td>
                </tr>
                <tr>
                    <td style="width: 140px">Fecha</td>
                    <td style="width: 15px">:</td>
                    <td>{{ date('d-m-Y') }}</td>
                </tr>
                <tr>
                    <td>Hora</td>
                    <td>:</td>
                    <td>{{ date('H:i:s') }}</td>
                </tr>
                <tr>
                    <td>Nombre</td>
                    <td>:</td>
                    <td>{{ $data['nombre'] }}</td>
                </tr>
                <tr>
                    <td>Empresa</td>
                    <td>:</td>
                    <td>{{ $data['empresa'] }}</td>
                </tr>
                <tr>
                    <td>Fono 1</td>
                    <td>:</td>
                    <td>{{ $data['fono_princ'] }}</td>
                </tr>
                <tr>
                    <td>Fono 2</td>
                    <td>:</td>
                    <td>{{ $data['fono_secun'] }}</td>
                </tr>

                <tr>
                    <td>Correo Electrónico</td>
                    <td>:</td>
                    <td>{{ $data['correo_elec'] }}</td>
                </tr>

                <tr>
                    <td colspan="3">
                        <h3>
                            INFORMACIÓN
                        </h3>
                    </td>
                </tr>

                <tr>
                    <td>Se deriva Llamada</td>
                    <td>:</td>
                    <td>{{ $data['derivacion'] }}</td>
                </tr>

                <tr>
                    <td>Devolver Llamado</td>
                    <td>:</td>
                    <td>{{ $data['acc_rapida1'] }}</td>
                </tr>

                <tr>
                    <td>Llamará mas tarde</td>
                    <td>:</td>
                    <td>{{ $data['acc_rapida2'] }}</td>
                </tr>

                <tr>
                    <td>Es Urgente</td>
                    <td>:</td>
                    <td>{{ $data['acc_rapida3'] }}</td>
                </tr>

                <tr>
                    <td>Generó Agenda</td>
                    <td>:</td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="3"><br></td>
                </tr>
                <tr>
                    <td><strong>MENSAJE:</strong></td>
                    <td>:</td>
                    <td>{{ $data['mensaje'] }}</td>
                </tr>

                <br><br>
                <tr>
                    <td bgcolor="#FFFFFF" style="padding: 20px 20px 30px 30px;" colspan="3">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td style="color: #001F3F; font-family: Arial, sans-serif; font-size: 14px;"
                                    width="75%">
                                    <center><small><strong>Notificación de Llamadas a Clientes</strong></small>
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
