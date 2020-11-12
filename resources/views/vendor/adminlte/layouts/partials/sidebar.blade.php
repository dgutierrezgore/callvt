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
            <li class="header">- GESTIÓN CALL -</li>
            <li class="treeview">
                <a href="#"><i class='fa fa-user'></i> <span>Operador</span> <i
                        class="fa fa-angle-down pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="/OperacionLlamada"><i class="fa fa-phone"></i> Operación Llamadas</a></li>
                    <li><a href="/RegistroLlamadas"><i class="fa fa-phone-square"></i> Registro Llamadas</a></li>
                    <li><a href="/ReporteDiario"><i class="fa fa-tasks"></i> Reportes Diarios</a></li>
                </ul>
            </li>
            <li class="header">- ADMINISTRACIÓN -</li>
            <li class="treeview">
                <a href="#"><i class='fa fa-user-plus'></i> <span>Clientes</span> <i
                        class="fa fa-angle-down pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="/NuevoCliente"><i class="fa fa-user-plus"></i> Registrar Cliente</a></li>
                    <li><a href="/VerClientes"><i class="fa fa-list"></i> Ver Clientes</a></li>
                    <li><a href="/VerRepClientes"><i class="fa fa-tasks"></i> Reporte por Cliente</a></li>
                </ul>
            </li>
            <li class="header">- OPCIONES DEL SISTEMA -</li>
            <li class="treeview">
                <a href="#"><i class='fa fa-gear'></i> <span>Usuarios</span> <i
                        class="fa fa-angle-down pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="/CrearUsuario"><i class="fa fa-user"></i> Crear Usuario</a></li>
                    <li><a href="/VerUsuarios"><i class="fa fa-gears"></i> Gestión de Usuarios</a></li>
                    <li><a href="/RepUsuario"><i class="fa fa-tasks"></i> Reporte por Usuario</a></li>
                </ul>
            </li>
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
