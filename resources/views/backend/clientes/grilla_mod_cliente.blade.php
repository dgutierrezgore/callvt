@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Listado de Clientes VTCall
@endsection

@section('contentheader_title')
    Listado de Clientes VTCall
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
                            Clientes Activos</a>
                    </li>
                    <li class=><a href="#datos_aceptados" data-toggle="tab"><i class="fa fa-user-secret"></i>
                            Clientes Archivados</a>
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
                                        <th>REP.LEGAL</th>
                                        <th>TELÉFONO / CELULAR</th>
                                        <th>MAIL</th>
                                        <th>ID / FONO / ANEXO</th>
                                        <th>ACCIONES</th>
                                    </tr>
                                    @foreach($clientes as $listado)
                                        <tr>
                                            <td>{{ $listado->rutcliente }}</td>
                                            <td>{{ $listado->razonsoccliente }}</td>
                                            <td>{{ $listado->nombresrlegal }} {{ $listado->apaternorlegal }}</td>
                                            <td>+56 9 {{ $listado->fonocliente }}</td>
                                            <td>{{ $listado->mailnotif }}</td>
                                            <td>{{ $listado->fonoentra1 }}</td>
                                            <td>
                                                <form action="/ModificarDatosCliente" method="POST">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="hidden" name="idcli"
                                                           value="{{ $listado->idclientes }}">
                                                    <button class="btn btn-warning btn-xs" type="submit"><i
                                                            class="fa fa-pencil"></i> Modificar Datos
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


