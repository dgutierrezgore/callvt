@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Grilla de Usuarios
@endsection

@section('contentheader_title')
    Gestión
@endsection

@section('contentheader_description')
    - Grilla de Gestión por Usuarios
@endsection

@section('main-content')

    <div class="row">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Grilla de todos los Usuarios / Módulos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="GrillaPrincipal" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>RUT</th>
                                    <th>Nombre</th>
                                    <th>Anexos Asignados</th>
                                    <th>Correo Electrónico</th>
                                    <th>Reporte Diario</th>
                                    <th>Reporte Semanal</th>
                                    <th>Reporte Mensual</th>
                                    <th>Reporte entre Fechas</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <center>
                                            <button class="btn btn-xs btn-warning" type="submit"><i
                                                    class="fa fa-pencil"></i> 17.574.786-9
                                            </button>
                                        </center>
                                    </td>
                                    <td>Daniel Esteban Gutiérrez Fariña</td>
                                    <td>0512 - 0577</td>
                                    <td>dgutierrez@vtcall.cl</td>
                                    <td>
                                        <center>
                                            <button class="btn btn-xs btn-success" type="submit"><i
                                                    class="fa fa-eye"></i> Generar
                                            </button>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <button class="btn btn-xs btn-success" type="submit"><i
                                                    class="fa fa-eye"></i> Generar
                                            </button>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <button class="btn btn-xs btn-success" type="submit"><i
                                                    class="fa fa-eye"></i> Generar
                                            </button>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <button class="btn btn-xs btn-success" type="submit"><i
                                                    class="fa fa-edit"></i> Formulario de Fechas
                                            </button>
                                        </center>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <center>
                                            <button class="btn btn-xs btn-warning" type="submit"><i
                                                    class="fa fa-pencil"></i> 16.370.384-3
                                            </button>
                                        </center>
                                    </td>
                                    <td>Claudio Gonzalez Luna</td>
                                    <td>0513 - 0514 - 0517</td>
                                    <td>contacto2@vtcall.cl</td>
                                    <td>
                                        <center>
                                            <button class="btn btn-xs btn-success" type="submit"><i
                                                    class="fa fa-eye"></i> Generar
                                            </button>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <button class="btn btn-xs btn-success" type="submit"><i
                                                    class="fa fa-eye"></i> Generar
                                            </button>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <button class="btn btn-xs btn-success" type="submit"><i
                                                    class="fa fa-eye"></i> Generar
                                            </button>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <button class="btn btn-xs btn-success" type="submit"><i
                                                    class="fa fa-edit"></i> Formulario de Fechas
                                            </button>
                                        </center>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
    </div>

@endsection
