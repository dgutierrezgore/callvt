@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Registro de Llamadas
@endsection

@section('contentheader_title')
    Registro de Llamadas
@endsection

@section('contentheader_description')
    - Grilla de Llamadas
@endsection

@section('main-content')

    <div class="row">
        <div class="col-xs-12">
            <div id="inicio" class="tab-pane active">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Grilla de llamadas al día de hoy {{ date('d-M-Y') }}</h3>
                        <!-- /.box-tools -->
                    </div>
                    <div class="box-body no-padding">
                        <table class="table table-striped">
                            <tbody>
                            <tr>
                                <th>#</th>
                                <th>Cliente</th>
                                <th>Llamada (Número - Nombre)</th>
                                <th>Duración</th>
                                <th>Operador</th>
                                <th>Mensaje</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>VTR S.A</td>
                                <td>+56 9 6655 0512 - Daniel Gutierrez</td>
                                <td>56 s.</td>
                                <td>Claudio Parra Gonzalez</td>
                                <td> consequuntur dolore dolorem doloremque eos excepturi exercitationem itaque molestiae
                                    nihil praesentium quae qusint tenetur vitae! Fugiat?</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Proclima SpA</td>
                                <td>+56 9 4455 2198 - Jesús Lopez</td>
                                <td>1:22 s.</td>
                                <td>Claudio Parra Gonzalez</td>
                                <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam beatae.
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
