<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <!-- MENU -->

            <li {!! (Request::is('/') ? 'class="active"' : '') !!}><a href="{{route('admin.dashboard')}}"><i class="fas fa-tachometer-alt fa-1x"></i> <span class="h4"> Dashboard</span></a></li>
            <li {!! (Request::is('/') ? 'class="active"' : '') !!}><a href="{{route('admin.orders')}}"><i class="fas fa-shopping-basket fa-1x"></i> <span class="h4"> Orders</span></a></li>

            <li {!! (Request::is('/') ? 'class="active treeview"' : '') !!}>
                <a href="#">
                    <i class="fas fa-blog fa-1x"></i>
                    <span class="h4"> Blog</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li {!! (Request::is('/') ? 'class="active"' : '') !!}><a href="{{route('admin.posts')}}"><i class="fas fa-list-ul"></i> Articles</a></li>
                    <li {!! (Request::is('/') ? 'class="active"' : '') !!}><a href="{{route('admin.new.post')}}"><i class="fas fa-plus-circle"></i> Add an article</a></li>
                </ul>
            </li>


            <li {!! (Request::is('/') ? 'class="active treeview"' : '') !!}>
                <a href="#">
                    <i class="fab fa-creative-commons-sampling fa-1x"></i>
                    <span class="h4"> Samples</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li {!! (Request::is('/') ? 'class="active"' : '') !!}><a href="{{route('admin.products')}}"><i class="fas fa-list-ul"></i> Samples</a></li>
                    <li {!! (Request::is('/') ? 'class="active"' : '') !!}><a href="{{route('admin.new.product')}}"><i class="fas fa-plus-circle"></i> Add a sample pack</a></li>
                </ul>
            </li>


            <li {!! (Request::is('/') ? 'class="active treeview"' : '') !!}>
                <a href="#">
                    <i class="fas fa-file-video fa-1x"></i>
                    <span class="h4"> Courses</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li {!! (Request::is('/') ? 'class="active"' : '') !!}><a href="#"><i class="fas fa-list-ul"></i> Courses</a></li>
                    <li {!! (Request::is('/') ? 'class="active"' : '') !!}><a href="#"><i class="fas fa-plus-circle"></i> Add a course</a></li>
                </ul>
            </li>


            <li {!! (Request::is('/') ? 'class="active"' : '') !!}><a href="{{route('admin.users')}}"><i class="fas fa-users fa-1x"></i> <span class="h4"> Users</span></a></li>
        </ul><!-- /.sidebar-menu -->
    </section><!-- /.sidebar -->
</aside>
