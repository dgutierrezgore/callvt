@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Reporte Diario
@endsection

@section('contentheader_title')
    Reporte Diario
@endsection

@section('contentheader_description')
    - Grilla de Llamadas
@endsection

@section('main-content')

    <div class="col-sm-9">
        <div id="resp">

        </div>
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#rep_diario" data-toggle="tab" aria-expanded="true"><i
                            class="fa fa-calendar"></i>
                        <strong>Reporte Diario</strong></a></li>
                <li class=""><a href="#rep_fechas" data-toggle="tab" aria-expanded="false"><i
                            class="fa fa-calendar-plus-o"></i>
                        <strong>Reporte entre fechas</strong></a></li>
                <li class=""><a href="#por_cliente" data-toggle="tab" aria-expanded="false"><i
                            class="fa fa-calendar-check-o"></i>
                        <strong>Reporte entre fechas por Cliente</strong></a></li>
            </ul>

            <div class="tab-content">

                <div class="tab-pane active" id="rep_diario">
                    <form class='form-horizontal' action="/GuardaDatosEmp" method="POST" id='formulario_res_ex'
                          enctype="multipart/form-data">
                        <input type="hidden" name="tipodocint" value="1">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Fecha Registro</label>
                                <div class="col-sm-2">
                                    <input type="date" class="form-control" id="fecdocint" name="fecdocint"
                                           onchange="eventos_fechas()">
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="reset" class="btn btn-default"><i class="fa fa-eraser"></i> Limpiar Formulario
                            </button>
                            <button type="submit" id="btn-res-ex" class="btn btn-success pull-right"><i
                                    class="fa fa-save"></i> Ver Reporte
                            </button>
                        </div>
                    </form>
                </div>

                <div class="tab-pane" id="rep_fechas">

                    <form class='form-horizontal' action="/GuardaDatosEmp" method="POST" id='formulario_res_ex'
                          enctype="multipart/form-data">
                        <input type="hidden" name="tipodocint" value="1">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Fecha Inicio Registro</label>
                                <div class="col-sm-2">
                                    <input type="date" class="form-control" id="fecdocint" name="fecdocint"
                                           onchange="eventos_fechas()">
                                </div>

                                <label for="inputEmail3" class="col-sm-2 control-label">Fecha Fin Registro</label>
                                <div class="col-sm-2">
                                    <input type="date" class="form-control" id="fecdocint" name="fecdocint"
                                           onchange="eventos_fechas()">
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="reset" class="btn btn-default"><i class="fa fa-eraser"></i> Limpiar Formulario
                            </button>
                            <button type="submit" id="btn-res-ex" class="btn btn-success pull-right"><i
                                    class="fa fa-save"></i> Ver Reporte
                            </button>
                        </div>
                    </form>

                </div>

                <div class="tab-pane" id="por_cliente">

                    <form class='form-horizontal' action="/GuardaDatosEmp" method="POST" id='formulario_res_ex'
                          enctype="multipart/form-data">
                        <input type="hidden" name="tipodocint" value="1">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Fecha Inicio Registro</label>
                                <div class="col-sm-2">
                                    <input type="date" class="form-control" id="fecdocint" name="fecdocint"
                                           onchange="eventos_fechas()">
                                </div>

                                <label for="inputEmail3" class="col-sm-2 control-label">Fecha Fin Registro</label>
                                <div class="col-sm-2">
                                    <input type="date" class="form-control" id="fecdocint" name="fecdocint"
                                           onchange="eventos_fechas()">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Cliente</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="funinvdocint">
                                        <option value="">76.370.384-3 - 9 6655 0512 - Daniel Gutierrez</option>
                                        <option value="">72.232.500-1 - 41 2230 700 - Movistar Concepción</option>
                                        <option value="">16.222.232-0 - 9 4344 8977 - Fernando Gonzalez y Cia Ltda.</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="reset" class="btn btn-default"><i class="fa fa-eraser"></i> Limpiar Formulario
                            </button>
                            <button type="submit" id="btn-res-ex" class="btn btn-success pull-right"><i
                                    class="fa fa-save"></i> Ver Reporte
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
    </div>

@endsection
