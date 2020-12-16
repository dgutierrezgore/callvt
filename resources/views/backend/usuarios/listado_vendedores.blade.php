@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Listado de Vendedores Habilitados
@endsection

@section('contentheader_title')
    Listado de Vendedores Habilitados
@endsection

@section('contentheader_description')
    - Base de Datos
@endsection

@section('main-content')

    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#datos_principales" data-toggle="tab"><i class="fa fa-users"></i>
                            Listado de Habilitados</a>
                    </li>
                    <li class=><a href="#datos_aceptados" data-toggle="tab"><i class="fa fa-close"></i>
                            Listado Inhabilitados</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="active tab-pane" id="datos_principales">
                        <div class="box">

                            <div class="box-body no-padding">
                                <table class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <th>RUN</th>
                                        <th>NOMBRE COMPLETO</th>
                                        <th>CLAVE</th>
                                        <th>TELÉFONO</th>
                                        <th>MAIL</th>
                                        <th>ACCIÓN</th>
                                    </tr>
                                    @foreach($vendedores as $listado)
                                        <tr>
                                            <td>{{ $listado->rutus }}</td>
                                            <td>{{ $listado->nombrevend }}</td>
                                            <td>{{ $listado->clavevend }}</td>
                                            <td>+56 9 {{ $listado->celus }}</td>
                                            <td>{{ $listado->mailpus }}</td>
                                            <td>
                                                <form action="/DesHabVend" method="POST">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="hidden" name="idvend"
                                                           value="{{ $listado->idvendedoresvt }}">
                                                    <button class="btn-xs btn-warning" type="submit"><i
                                                            class="fa fa-close"></i> Deshabilitar
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>

                    </div>

                    <div class="tab-pane" id="datos_aceptados">
                        <div class="box">

                            <div class="box-body no-padding">
                                <table class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <th>RUN</th>
                                        <th>NOMBRE COMPLETO</th>
                                        <th>CLAVE</th>
                                        <th>TELÉFONO</th>
                                        <th>MAIL</th>
                                        <th>ACCIÓN</th>
                                    </tr>
                                    @foreach($vendedores_d as $listado)
                                        <tr>
                                            <td>{{ $listado->rutus }}</td>
                                            <td>{{ $listado->nombrevend }}</td>
                                            <td>{{ $listado->clavevend }}</td>
                                            <td>+56 9 {{ $listado->celus }}</td>
                                            <td>{{ $listado->mailpus }}</td>
                                            <td>
                                                <form action="/HabVend" method="POST">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="hidden" name="idvend"
                                                           value="{{ $listado->idvendedoresvt }}">
                                                    <button class="btn-xs btn-success" type="submit"><i
                                                            class="fa fa-check"></i> Habilitar
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>

                </div>

                <!-- /.tab-content -->
            </div>
        </div>
    </div>

@endsection


