<body class="animsition">
<div class="page-wrapper">
    <!-- HEADER MOBILE-->
    <header class="header-mobile d-block d-lg-none">
        <div class="header-mobile__bar">
            <div class="container-fluid">
                <div class="header-mobile-inner">
                    <h3>Admin page</h3>
                    <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                    </button>
                </div>
            </div>
        </div>
        <nav class="navbar-mobile">
            <div class="container-fluid">
                <ul class="navbar-mobile__list list-unstyled">
                    <li>
                        <a href="{{url('/admin_page')}}">
                            <i class="fas fa-table"></i>Users</a>
                    </li>
                    <li>
                        <a href="{{url('/admin_insert')}}">
                            <i class="far fa-check-square"></i>Add user</a>
                    </li>
                    <li>
                        <a href="{{url('/admin/gallery')}}">
                            <i class="fas fa-table"></i>Gallery</a>
                    </li>
                    <li>
                        <a href="{{url('/admin/add_post')}}">
                            <i class="far fa-check-square"></i>Add post</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- END HEADER MOBILE-->

    <!-- MENU SIDEBAR-->
    <aside class="menu-sidebar d-none d-lg-block">
        <div class="logo">
            <h3>Admin page</h3>
        </div>
        <div class="menu-sidebar__content js-scrollbar1">
            <nav class="navbar-sidebar">
                <ul class="list-unstyled navbar__list">
                    <li>
                        <a href="{{url('/admin_page')}}">
                            <i class="fas fa-table"></i>Users</a>
                    </li>
                    <li>
                        <a href="{{url('/admin_insert')}}">
                            <i class="far fa-check-square"></i>Add user</a>
                    </li>
                    <li>
                        <a href="{{url('/admin/gallery')}}">
                            <i class="fas fa-table"></i>Gallery</a>
                    </li>
                    <li>
                        <a href="{{url('/admin/add_post')}}">
                            <i class="far fa-check-square"></i>Add post</a>
                    </li>
                    <li>
                        <a href="{{url('/admin/message')}}">
                            <i class="fas fa-envelope"></i>Messages</a>
                    </li>
                    <li>
                        <a href="{{url('/admin/activity')}}">
                            <i class="fas fa-table"></i>Activity</a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
