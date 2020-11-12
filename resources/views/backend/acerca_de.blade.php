@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')



    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <div class="panel panel-success">
                    <div class="panel-heading">
                        <i class="fa fa-newspaper-o"></i> <strong>Cuadro Panel de Novedades al 21 de Octubre 2020</strong>
                        <small>V.01</small>
                    </div>

                    <div class="panel-body">
                        <strong>Notas del Desarrollador</strong>
                    </div>
                    <div class="panel-body">
                        <ul>
                            <i class="fa fa-check"></i> <strong>Hito 1</strong> - Modelo y Normas Gráficas al 21 Oct 2020.<br>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
