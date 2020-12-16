@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Reporte por Vendedor
@endsection

@section('contentheader_title')
    Reporte por Vendedor
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
                            Reporte por Vendedores Habilitados</a>
                    </li>
                    <li class=><a href="#datos_aceptados" data-toggle="tab"><i class="fa fa-close"></i>
                            Reporte por Vendedores Inhabilitados</a>
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
                                        <th>PREVENTAS</th>
                                        <th>VENTAS</th>
                                    </tr>
                                    <tr>
                                        <td>S/I</td>
                                        <td>S/I</td>
                                        <td>S/I</td>
                                        <td>S/I</td>
                                    </tr>
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
                                        <th>PREVENTAS</th>
                                        <th>VENTAS</th>
                                    </tr>
                                    <tr>
                                        <td>S/I</td>
                                        <td>S/I</td>
                                        <td>S/I</td>
                                        <td>S/I</td>
                                    </tr>
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
