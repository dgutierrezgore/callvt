<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Oficina VTCall System')
        <small>@yield('contentheader_description','| Oficina Virtual')</small>
    </h1>
    <ol class="breadcrumb">
        <li>HOLA!: <strong>{{Auth::user()->name}}</strong></li>
        <li><a href="#"><i class="fa fa-clock-o"></i> {{ date_format(now(),"d-M-Y") }}</a></li>
        <li class="active">{{ date_format(now(),"H:i:s") }}</li>
    </ol>
</section>
