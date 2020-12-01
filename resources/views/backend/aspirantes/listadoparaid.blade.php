@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Listado de Aspirantes a Ventas
@endsection

@section('contentheader_title')
    Listado de Aspirantes a Ventas
@endsection

@section('contentheader_description')
    - Base de Datos
@endsection

@section('main-content')

    <div class="row">
        <div class="col-md-10">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#datos_principales" data-toggle="tab"><i class="fa fa-users"></i>
                            Listado de Vendedores Aceptados</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="active tab-pane" id="datos_principales">
                        <div class="box">

                            <div class="box-body no-padding">
                                <table class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <th style="width: 10px">Acción</th>
                                        <th>
                                            <center>ID Vendedor</center>
                                        </th>
                                        <th>Rut Usuario</th>
                                        <th>Nombre Completo - Fono / Celular</th>
                                        <th style="width: 300px">Avance Inscripción</th>
                                        <th style="width: 50px">%</th>
                                    </tr>
                                    @foreach($usuariospend as $listado)
                                        <tr>
                                            <td>
                                                <form action="/ComplementarUsuario" method="POST">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="hidden" name="iduser"
                                                           value="{{ $listado->idvtcallusers }}">
                                                    <button class="btn btn-primary btn-xs" type="submit"><i
                                                            class="fa fa-pencil"></i> COMPLEMENTAR
                                                    </button>
                                                </form>
                                            </td>
                                            <td>
                                                <center>@if($listado->idusuario==null)
                                                        <button class="btn btn-primary btn-xs"><i
                                                                class="fa fa-key"></i> ID SIN ASIGNAR
                                                        </button>
                                                    @else
                                                        <button class="btn btn-primary btn-xs"><i
                                                                class="fa fa-key"></i> {{ $listado->idusuario }}
                                                        </button>
                                                    @endif
                                                </center>
                                            </td>
                                            <td>{{ $listado->rutus }}</td>
                                            <td>{{ $listado->nombresus }} {{ $listado->paternous }} {{ $listado->maternous }}
                                                - {{ $listado->ffijous }} / +56 9 {{ $listado->celus }}</td>
                                            <td>
                                                <div class="progress progress-xs progress-striped active">
                                                    <div class="progress-bar progress-bar-success"
                                                         style="width: {{ (($listado->avancepl1us+$listado->avancepl2us)*100/3) }}%">
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-green">{{ number_format((($listado->avancepl1us+$listado->avancepl2us)*100/3),'.0') }}%</span></td>
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


        <div class="col-md-2">
            <!-- Profile Image -->
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h4 class="box-title"><i class="fa fa-info"></i> Información del Usuario</h4>
                </div>
                <div class="box-body box-profile">

                    <center><img src="https://adminlte.io/themes/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle"
                                 alt="User Image"></center>

                    <hr>
                    <center><h4>Daniel E. Gutiérrez Fariña</h4></center>
                </div>
                <!-- /.box-body -->
            </div>
        </div>

    </div>

@endsection


