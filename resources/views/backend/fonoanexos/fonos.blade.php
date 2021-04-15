@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Mantenedor de Fonos
@endsection

@section('contentheader_title')
    Mantenedor de Fonos
@endsection

@section('contentheader_description')
    - Base de Datos
@endsection

@section('main-content')

    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#datos_principales" data-toggle="tab"><i class="fa fa-pencil"></i>
                            Creador de Fonos</a>
                    </li>
                    <li class=><a href="#datos_aceptados" data-toggle="tab"><i class="fa fa-edit"></i>
                            Mantenedor de Fonos</a>
                    </li>
                    <li class><a href="#datos_descartados" data-toggle="tab"><i class="fa fa-mobile-phone"></i>
                            Fonos Disponibles</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="active tab-pane" id="datos_principales">
                        <div class="box">
                            <form class="form-horizontal" method="post" action="/CreaFonoNuevo">
                                <div class="box-body">
                                    <div id="alerta_tab7">

                                    </div>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Número de Fono Fijo</label>
                                        <div class="col-sm-2">
                                            <input type="number" class="form-control" id="num_an"
                                                   name="num_fn" onkeyup="mayusculas_cel(this)" required>
                                        </div>
                                    </div>
                                </div>

                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="reset" class="btn btn-default"><i class="fa fa-eraser"></i>
                                        Limpiar
                                        Formulario
                                    </button>

                                    <button type="submit" class="btn btn-success pull-right"
                                            id="btn_info_general">
                                        <i
                                            class="fa fa-save"></i>
                                        Crear Nuevo Fono
                                    </button>

                                </div>
                                <!-- /.box-footer -->
                            </form>
                        </div>
                    </div>

                    <div class="tab-pane" id="datos_aceptados">
                        <div class="box">
                            <div class="box-body no-padding">
                                <table class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <th>NÚMERO FONO FIJO</th>
                                        <th>EMPRESA ASOCIADA</th>
                                        <th>ESTADO</th>
                                        <th>ACCIONES</th>
                                    </tr>
                                    @foreach($a_ocu as $listado)
                                        <tr>
                                            <td>{{ $listado->numexterno }}</td>
                                            <td>{{ $listado->razonsoccliente }}</td>
                                            <td>
                                                <button class="btn btn-warning btn-xs">OCUPADO</button>
                                            </td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="datos_descartados">
                        <div class="box">
                            <div class="box-body no-padding">
                                <table class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <th>NÚMERO DE FONO FIJO</th>
                                        <th>ESTADO</th>
                                        <th>ACCIONES</th>
                                    </tr>
                                    @foreach($a_dis as $listado)
                                        <tr>
                                            <td>{{ $listado->numexterno }}</td>
                                            <td>
                                                <button class="btn btn-success btn-xs"> DISPONIBLE</button>
                                            </td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- /.tab-content -->
            </div>
        </div>
    </div>

@endsection


