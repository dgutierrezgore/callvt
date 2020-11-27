@extends('adminlte::layouts.appfake')

@section('htmlheader_title')
    Acceso Denegado
@endsection

@section('contentheader_title')
    Acceso Denegado
@endsection

@section('contentheader_description')
    - desde: IP: {{\Request::ip()}}
@endsection

@section('main-content')

    <section class="content">
        <section class="content">

            <div class="error-page">
                <h2 class="headline text-red">300</h2>

                <div class="error-content">
                    <h3><i class="fa fa-warning text-red"></i> Oops! Usted no tiene acceso a este sistema.</h3>

                    <p>
                        Por favor tome contacto con Soporte de VTCALL Sys.
                    </p>
                    <p>Al teléfono +56 9 6655 0512 ó al correo electrónico soporte@virtualcall.cl</p>

                </div>
            </div>
            <!-- /.error-page -->

        </section>

@endsection
