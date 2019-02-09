<nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle hidden-lg hidden-md hidden-sm" data-toggle="offcanvas" role="button">
        <span class="sr-only"></span>
    </a>
    <ul class="nav navbar-nav hidden-xs">
        <li>
            <a href="javascript:history.back()" class="" data-step="7" data-intro="Le boutton retour se situe ici ! ">
                <i class="fa fa-arrow-circle-o-left"></i> Retour
            </a>
        </li>
    </ul>
    <!-- Header Navbar: style can be found in header.less -->

    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <li>
                <a href="{{route('home')}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    <span class="hidden-xs"> Store</span>
                </a>
            </li>
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{ asset('vendor/adminlte/dist/img/avatar.png') }}" class="user-image" alt="User Image">
                    <span class="hidden-xs">Bienvenue  {{Auth::user()->name}}</span>
                    <span class="caret hidden-xs"></span>
                </a>
                <ul class="dropdown-menu std" role="menu">
                    <!--<li class="divider"></li>-->
                    <li><a href="{{ route('logout') }}"><i class="fa fa-fw fa-power-off"></i>Déconnexion</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
