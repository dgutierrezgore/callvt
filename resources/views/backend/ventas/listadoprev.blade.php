@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Listado de Pre Ventas Ingresadas
@endsection

@section('contentheader_title')
    Listado de Pre Ventas Ingresadas
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
                            Listado de PreVentas</a>
                    </li>
                    <li class=><a href="#datos_aceptados" data-toggle="tab"><i class="fa fa-user-plus"></i>
                            PreVentas Anuladas</a>
                    </li>
                    <li class><a href="#datos_descartados" data-toggle="tab"><i class="fa fa-close"></i>
                            PreVentas Aceptadas</a>
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
                                        <th>RAZÓN SOCIAL</th>
                                        <th>NOMBRE CONTACTO</th>
                                        <th>TELÉFONO</th>
                                        <th>MAIL</th>
                                        <th>VENDEDOR</th>
                                        <th>GENERAR CONTRATO</th>
                                    </tr>
                                    @foreach($preventas as $listado)
                                        <tr>
                                            <td>
                                                <form action="/FichaPreventa" method="post">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="hidden" name="idpreve"
                                                           value="{{ $listado->idpreventas }}">
                                                    <button class="btn btn-xs btn-success" type="submit"><i
                                                            class="fa fa-file-pdf-o"></i> {{ $listado->rutprev }}
                                                    </button>
                                                </form>
                                            </td>
                                            <td>{{ $listado->razonsocprev }}</td>
                                            <td>{{ $listado->nomcontprev }}</td>
                                            <td>+56 9 {{ $listado->celularprev }}</td>
                                            <td>{{ $listado->mailcontprev }}</td>
                                            <td>{{ $listado->nombrevend }}</td>
                                            <td>
                                                <form action="/GenContrato" method="post">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="hidden" name="idpreve"
                                                           value="{{ $listado->idpreventas }}">
                                                    <button class="btn btn-xs btn-success" type="submit"><i
                                                            class="fa fa-file-word-o"></i> GENERAR CONTRATO
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
                                        <th>RAZÓN SOCIAL</th>
                                        <th>NOMBRE CONTACTO</th>
                                        <th>TELÉFONO</th>
                                        <th>MAIL</th>
                                        <th>VENDEDOR</th>
                                    </tr>
                                    @foreach($prev_rec as $listado)
                                        <tr>
                                            <td>{{ $listado->rutprev }}</td>
                                            <td>{{ $listado->razonsocprev }}</td>
                                            <td>{{ $listado->nomcontprev }}</td>
                                            <td>+56 9 {{ $listado->celularprev }}</td>
                                            <td>{{ $listado->mailcontprev }}</td>
                                            <td>{{ $listado->nombrevend }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>

                    <div class="tab-pane" id="datos_descartados">
                        <div class="box">

                            <div class="box-body no-padding">
                                <table class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <th>RUN</th>
                                        <th>RAZÓN SOCIAL</th>
                                        <th>NOMBRE CONTACTO</th>
                                        <th>TELÉFONO</th>
                                        <th>MAIL</th>
                                        <th>VENDEDOR</th>
                                    </tr>
                                    @foreach($prev_acep as $listado)
                                        <tr>
                                            <td>{{ $listado->rutprev }}</td>
                                            <td>{{ $listado->razonsocprev }}</td>
                                            <td>{{ $listado->nomcontprev }}</td>
                                            <td>+56 9 {{ $listado->celularprev }}</td>
                                            <td>{{ $listado->mailcontprev }}</td>
                                            <td>{{ $listado->nombrevend }}</td>
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


