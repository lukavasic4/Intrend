<div class="page-container">
    <header class="header-desktop">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="header-wrap">
                    <div class="noti__item">
                        <ul id="link">
                            @foreach($meni as $m)
                                @component("partials.link",[
                                    "link" => $m
                                ]);
                                @endcomponent
                            @endforeach
                            @if(!session()->has('user'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/login') }}">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/register') }}">Register</a>
                                </li>
                            @endif

                            @if(session()->has('user'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/admin_page') }}">Admin page</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/logout') }}">Logout</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                    <div class="header-button">
                        <div class="account-wrap">
                            <div class="account-item clearfix js-item-menu">
                                <div class="content">
                                    <a class="js-acc-btn" href="#">{{session()->get("user")->first_name}} {{session()->get("user")->last_name}}</a>
                                </div>
                                <div class="account-dropdown js-dropdown">
                                    <div class="info clearfix">
                                        <div class="content">
                                            <h5 class="name">
                                                <a href="#">{{session()->get("user")->first_name}} {{session()->get("user")->last_name}}</a>
                                            </h5>
                                            <span class="email">{{session()->get("user")->email}} </span>
                                        </div>
                                    </div>
                                    <div class="account-item">
                                        <div class="account-dropdown__footer">
                                            <a href="{{url('/logout')}}">
                                                <i class="zmdi zmdi-power"></i>Logout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- HEADER DESKTOP-->

