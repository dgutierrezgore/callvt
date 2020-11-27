<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Acceso Vendedores VT Call Sys.</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">

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
    <link href="css/signin.css" rel="stylesheet">
</head>
<body class="text-center">
<form class="form-signin" method="post" action="/PanelVentas">
    <img class="mb-4" src="http://18.222.235.81/img/logovtcall.png" alt="VT CALL System">
    <div class="mb-5">
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> Acceso Denegado!</h4>
            No es posible iniciar sesión, verifique contraseña o contacte al Supervisor.
        </div>
    </div>
    <h1 class="h3 mb-3 font-weight-normal">Acceso del vendedor</h1>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <label for="inputPassword" class="sr-only">Contraseña</label>
    <input type="password" id="clavevend" name="clavevend" class="form-control" placeholder="Contraseña" required
           autofocus>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Acceder</button>
    <p class="mt-5 mb-3 text-muted">&copy; {{ date('Y') }} VT Call System</p>
</form>
</body>
</html>
