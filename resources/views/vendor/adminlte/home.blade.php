@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')



    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-success">
                    <div class="panel-heading"><i class="fa fa-home"></i> Inicio</div>

                    <div class="panel-body">
                        ¡Hola!<strong></strong>, Bienvenido a
                        <strong>Oficina Virtual de Registros VTCALL System</strong>.
                    </div>
                </div>

                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <i class="fa fa-newspaper-o"></i> <strong>Cuadro Panel de Novedades al 01 de Diciembre 2020</strong>
                        <small>V.02</small>
                    </div>

                    <div class="panel-body">
                        Noticias del día
                    </div>
                    <div class="panel-body">
                        <ul>
                            <i class="fa fa-check"></i> ¡Hola Mundo!. <br>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
