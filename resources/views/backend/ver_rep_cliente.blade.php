@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Grilla de Reportes
@endsection

@section('contentheader_title')
    Reportes
@endsection

@section('contentheader_description')
    - Grilla de Reportes por Cliente
@endsection

@section('main-content')

    <div class="row">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Grilla de todos los Clientes / Reportes</h3>
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
                                    <th>Telefono</th>
                                    <th>Correo Electrónico</th>
                                    <th>Fecha Inicio Contrato</th>
                                    <th>Reportes</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <center><button class="btn btn-xs btn-success" type="submit"><i
                                                    class="fa fa-pencil"></i> 17.574.786-9
                                            </button></center>
                                    </td>
                                    <td>Daniel Esteban Gutiérrez Fariña</td>
                                    <td>+56 9 6655 0512</td>
                                    <td>contacto@danielgutierrez.cl</td>
                                    <td>02 Octubre 2020</td>
                                    <td>
                                        <button class="btn btn-xs btn-success" type="submit"> Anual</button>
                                        <button class="btn btn-xs btn-primary" type="submit"> Mensual</button>
                                        <button class="btn btn-xs btn-warning" type="submit"> Semanal</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <center><button class="btn btn-xs btn-success" type="submit"><i
                                                    class="fa fa-pencil"></i> 76.370.384-3
                                            </button></center>
                                    </td>
                                    <td>Consultora Gutiérrez & Gutiérrez Ltda</td>
                                    <td>+56 41 2335 700</td>
                                    <td>contacto@consultorait.cl</td>
                                    <td>29 Enero 2019</td>
                                    <td><button class="btn btn-xs btn-success" type="submit"> Anual</button>
                                        <button class="btn btn-xs btn-primary" type="submit"> Mensual</button>
                                        <button class="btn btn-xs btn-warning" type="submit"> Semanal</button></td>
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
