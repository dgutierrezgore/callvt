<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <br>
        <center>
            <a href="/home"><img src="img/logovtcall.png" alt="Logo VTCALL System"></a>
        </center>
        <br>
        <ul class="sidebar-menu">
            <li class="active"><a href="{{ url('home') }}"><i class='fa fa-home'></i> <span>Inicio</span></a></li>
            @if(Auth::user()->estadous==1 || Auth::user()->estadous==2)
                <li class="header">- GESTIÓN CALL -</li>
                <li class="treeview">
                    <a href="#"><i class='fa fa-user'></i> <span>Operador</span> <i
                            class="fa fa-angle-down pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="/OperacionLlamada"><i class="fa fa-phone"></i> Operación Llamadas</a></li>
                    </ul>
                </li>
            @endif
            @if(Auth::user()->estadous==1 || Auth::user()->estadous==3)
                <li class="header">- ADMINISTRACIÓN -</li>
                <li class="treeview">
                    <a href="#"><i class='fa fa-user-plus'></i> <span>Clientes</span> <i
                            class="fa fa-angle-down pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="/NuevoCliente"><i class="fa fa-user-plus"></i> Registrar Cliente</a></li>
                    </ul>
                </li>
            @endif
            @if(Auth::user()->estadous==1 || Auth::user()->estadous==4)
                <li class="header">- GERENCIA GENERAL -</li>
                <li class="treeview">
                    <a href="#"><i class='fa fa-user-plus'></i> <span>Vendedores</span> <i
                            class="fa fa-angle-down pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="/Aspirantes"><i class="fa fa-user"></i> Ver Aspirantes</a></li>
                        <li><a href="/VendedorID"><i class="fa fa-user"></i> Asignar ID Vendedor</a></li>
                        <li><a href="/VendedorGestion"><i class="fa fa-user"></i> Gestión Vendedor</a></li>
                        <li><a href="/VendedorRep"><i class="fa fa-user"></i> Reportes del Vendedor</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#"><i class='fa fa-dollar'></i> <span>Ventas</span> <i
                            class="fa fa-angle-down pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="/PreVentasVT"><i class="fa fa-user"></i> Ver Preventas</a></li>
                    </ul>
                </li>
            @endif
            <li><a href="/AcercaDe"><i class='fa fa-info-circle'></i> <span>Acerca de Sistema</span></a></li>
            <hr>
            <li><a href="{{ url('/logout') }}"
                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out"></i> Cerrar Sesión
                </a></li>
            <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                  style="display: none;">
                {{ csrf_field() }}
                <input type="submit" value="logout" style="display: none;">
            </form>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
