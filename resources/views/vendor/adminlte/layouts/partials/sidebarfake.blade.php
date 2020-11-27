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
