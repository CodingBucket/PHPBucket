<header class="main-header">

    <a href="index2.html" class="logo">

        <span class="logo-mini">LV</span>

        <span class="logo-lg"><b>LV 5.2 CMS Admin</b></span>
    </a>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <li class="dropdown user user-menu">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ URL::to('/src/admin/img/user.png') }}" class="user-image" alt="User Image">
                        <span class="hidden-xs">Admin</span>
                    </a>

                    <ul class="dropdown-menu">

                        <li class="user-header">

                            <img src="{{ URL::to('/src/admin/img/user.png') }}" class="img-circle" alt="User Image">

                            <p>Hasan Ahmed Khan</p>

                        </li>

                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ route('logout') }}" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>

                    </ul>
                </li>

            </ul>
        </div>

    </nav>
</header>