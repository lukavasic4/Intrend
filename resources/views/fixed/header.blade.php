<div class="inner-page-banner" id="home">
    <!--Header-->
    <header>
        <div class="container agile-banner_nav">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">

                <h1><a class="navbar-brand" href="{{url('/')}}">In <span class="display"> Trend</span></a></h1>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
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
                            @if(session()->has('user') && session('user')->role_id == 1)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/admin_page') }}">Admin page</a>
                                </li>
                            @endif
                            @if(session()->has('user'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/logout') }}">Logout</a>
                                </li>
                            @endif
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!--Header-->
</div>
