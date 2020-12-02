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
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#datos_principales" data-toggle="tab"><i class="fa fa-users"></i>
                            Listado de Aspirantes Inscritos</a>
                    </li>
                    <li class=><a href="#datos_aceptados" data-toggle="tab"><i class="fa fa-user-plus"></i>
                            Listado de Aspirantes Aceptados</a>
                    </li>
                    <li class><a href="#datos_descartados" data-toggle="tab"><i class="fa fa-close"></i>
                            Listado de Aspirantes Descartados</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="active tab-pane" id="datos_principales">
                        <div class="box">

                            <div class="box-body no-padding">
                                <table class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <th>
                                            <center>RUN</center>
                                        </th>
                                        <th>Nombre Completo</th>
                                        <th>Fecha Nacimiento</th>
                                        <th>Comuna</th>
                                        <th>Celular / Correo Electrónico</th>
                                        <th>Nivel Educacional</th>
                                        <th>Acción</th>
                                    </tr>
                                    @foreach($aspirantes as $listado)
                                        <tr>
                                            <td>{{ $listado->rutasp }}</td>
                                            <td>{{ $listado->nombresasp }} {{ $listado->appaternoasp }} {{ $listado->apmaternoasp }}</td>
                                            <td>{{ $listado->fecnacasp }}</td>
                                            <td>{{ $listado->nombrecomuna }}</td>
                                            <td><a href="tel:+569{{ $listado->celularasp }}"> +56
                                                    9 {{ $listado->celularasp }}</a> | {{ $listado->correoasp }}</td>
                                            <td>@if($listado->nivelestasp==1)
                                                    ENS. MEDIA COMPLETA
                                                @elseif($listado->nivelestasp==2)
                                                    TÉC. COMPLETO
                                                @elseif($listado->nivelestasp==3)
                                                    TÉC. INCOMPLETO
                                                @elseif($listado->nivelestasp==4)
                                                    PROF. COMPLETO
                                                @elseif($listado->nivelestasp==5)
                                                    PROF. INCOMPLETO
                                                @endif
                                            </td>
                                            <td>
                                                <form action="/AceptarAspirante" method="post">
                                                    <input type="hidden" name="idasp"
                                                           value="{{ $listado->idaspirantesvend }}">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button class="btn btn-xs btn-block btn-success" type="submit">
                                                        ACEPTAR
                                                    </button>
                                                </form>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td colspan="6"><strong>OBSERVACIÓN</strong> : {{ $listado->obsasp }}</td>
                                            <td>
                                                <form action="/DescartarAspirante" method="post">
                                                    <input type="hidden" name="idasp"
                                                           value="{{ $listado->idaspirantesvend }}">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button class="btn btn-xs btn-block btn-warning" type="submit">
                                                        DESCARTAR
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="7"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="7"></td>
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
                                        <th>
                                            <center>RUN</center>
                                        </th>
                                        <th>Nombre Completo</th>
                                        <th>Fecha Nacimiento</th>
                                        <th>Comuna</th>
                                        <th>Celular / Correo Electrónico</th>
                                        <th>Nivel Educacional</th>
                                        <th>Acción</th>
                                    </tr>
                                    @foreach($aceptados as $listado)
                                        <tr>
                                            <td>{{ $listado->rutasp }}</td>
                                            <td>{{ $listado->nombresasp }} {{ $listado->appaternoasp }} {{ $listado->apmaternoasp }}</td>
                                            <td>{{ $listado->fecnacasp }}</td>
                                            <td>{{ $listado->nombrecomuna }}</td>
                                            <td><a href="tel:+569{{ $listado->celularasp }}"> +56
                                                    9 {{ $listado->celularasp }}</a> | {{ $listado->correoasp }}</td>
                                            <td>@if($listado->nivelestasp==1)
                                                    ENS. MEDIA COMPLETA
                                                @elseif($listado->nivelestasp==2)
                                                    TÉC. COMPLETO
                                                @elseif($listado->nivelestasp==3)
                                                    TÉC. INCOMPLETO
                                                @elseif($listado->nivelestasp==4)
                                                    PROF. COMPLETO
                                                @elseif($listado->nivelestasp==5)
                                                    PROF. INCOMPLETO
                                                @endif
                                            </td>
                                            <td>
                                                <form action="/CrearVendedor" method="post">
                                                    <input type="hidden" name="idasp"
                                                           value="{{ $listado->idaspirantesvend }}">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button class="btn btn-xs btn-block btn-success" type="submit">
                                                        CONTINUAR
                                                    </button>
                                                </form>
                                                <br>
                                                <form action="/DescartarAspirante" method="post">
                                                    <input type="hidden" name="idasp"
                                                           value="{{ $listado->idaspirantesvend }}">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button class="btn btn-xs btn-block btn-warning" type="submit">
                                                        DESCARTAR
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

                    <div class="tab-pane" id="datos_descartados">
                        <div class="box">

                            <div class="box-body no-padding">
                                <table class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <th>
                                            <center>RUN</center>
                                        </th>
                                        <th>Nombre Completo</th>
                                        <th>Fecha Nacimiento</th>
                                        <th>Comuna</th>
                                        <th>Celular / Correo Electrónico</th>
                                        <th>Nivel Educacional</th>
                                    </tr>
                                    @foreach($descartados as $listado)
                                        <tr>
                                            <td>{{ $listado->rutasp }}</td>
                                            <td>{{ $listado->nombresasp }} {{ $listado->appaternoasp }} {{ $listado->apmaternoasp }}</td>
                                            <td>{{ $listado->fecnacasp }}</td>
                                            <td>{{ $listado->nombrecomuna }}</td>
                                            <td><a href="tel:+569{{ $listado->celularasp }}"> +56
                                                    9 {{ $listado->celularasp }}</a> | {{ $listado->correoasp }}</td>
                                            <td>@if($listado->nivelestasp==1)
                                                    ENS. MEDIA COMPLETA
                                                @elseif($listado->nivelestasp==2)
                                                    TÉC. COMPLETO
                                                @elseif($listado->nivelestasp==3)
                                                    TÉC. INCOMPLETO
                                                @elseif($listado->nivelestasp==4)
                                                    PROF. COMPLETO
                                                @elseif($listado->nivelestasp==5)
                                                    PROF. INCOMPLETO
                                                @endif
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


