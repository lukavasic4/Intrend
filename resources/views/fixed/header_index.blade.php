<div class="banner" id="home">
    <div class="cd-radial-slider-wrapper">

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

        <ul class="cd-radial-slider" data-radius1="60" data-radius2="1364" data-centerx1="110" data-centerx2="1290">
            <li class="visible">
                <div class="svg-wrapper">
                    <svg viewBox="0 0 1400 800">
                        <title>Animated SVG</title>
                        <defs>
                            <clipPath id="cd-image-1">
                                <circle id="cd-circle-1" cx="110" cy="400" r="1364"/>
                            </clipPath>
                        </defs>
                        <image height='800px' width="1400px" clip-path="url(#cd-image-1)" xlink:href="images/1.jpg"></image>
                    </svg>
                </div> <!-- .svg-wrapper -->
                <div class="cd-radial-slider-content">
                    <div class="wrapper">
                        <div class="text-center">
                            <h2>Interior Architecture </h2>
                            <h3> Furniture </h3>
                            <a href="{{url('/about')}}" class="read">Read More <i class="fas fa-caret-right"></i></a>
                        </div>
                    </div>
                </div> <!-- .cd-radial-slider-content -->
            </li>
            <li class="next-slide">
                <div class="svg-wrapper">
                    <svg viewBox="0 0 1400 800">
                        <title>Animated SVG</title>
                        <defs>
                            <clipPath id="cd-image-2">
                                <circle id="cd-circle-2" cx="1290" cy="400" r="60"/>
                            </clipPath>
                        </defs>
                        <image height='800px' width="1400px" clip-path="url(#cd-image-2)" xlink:href="images/2.jpg"></image>
                    </svg>
                </div> <!-- .svg-wrapper -->
                <div class="cd-radial-slider-content text-center">
                    <div class="wrapper">
                        <div class="text-center">
                            <h3>Interior Furniture </h3>
                            <h3> Architecture </h3>
                            <a href="{{url('/about')}}" class="read">Read More <i class="fas fa-caret-right"></i></a>

                        </div>
                    </div>
                </div> <!-- .cd-radial-slider-content -->
            </li>
            <li>
                <div class="svg-wrapper">
                    <svg viewBox="0 0 1400 800">
                        <title>Animated SVG</title>
                        <defs>
                            <clipPath id="cd-image-3">
                                <circle id="cd-circle-3" cx="110" cy="400" r="60"/>
                            </clipPath>
                        </defs>
                        <image height='800px' width="1400px" clip-path="url(#cd-image-3)" xlink:href="images/3.jpg"></image>
                    </svg>
                </div> <!-- .svg-wrapper -->
                <div class="cd-radial-slider-content text-center">
                    <div class="wrapper">
                        <div class="text-center">
                            <h3>Interior Design </h3>
                            <h3> Architecture </h3>
                            <a href="{{url('/about')}}" class="read">Read More <i class="fas fa-caret-right"></i></a>
                        </div>
                    </div>
                </div> <!-- .cd-radial-slider-content -->
            </li>
            <li class="prev-slide">
                <div class="svg-wrapper">
                    <svg viewBox="0 0 1400 800">
                        <title>Animated SVG</title>
                        <defs>
                            <clipPath id="cd-image-4">
                                <circle id="cd-circle-4" cx="110" cy="400" r="60"/>
                            </clipPath>
                        </defs>
                        <image height='800px' width="1400px" clip-path="url(#cd-image-4)" xlink:href="images/4.jpg"></image>
                    </svg>
                </div> <!-- .svg-wrapper -->
                <div class="cd-radial-slider-content text-center">
                    <div class="wrapper">
                        <div class="text-center">
                            <h3>Interior Architecture </h3>
                            <h3> furniture </h3>
                            <a href="{{url('/about')}}" class="read">Read More <i class="fas fa-caret-right"></i></a>
                        </div>
                    </div>
                </div> <!-- .cd-radial-slider-content -->
            </li>
        </ul> <!-- .cd-radial-slider -->
        <ul class="cd-radial-slider-navigation">
            <li><a href="#0" class="next"><i class="fas fa-chevron-right"></i></a></li>
            <li><a href="#0" class="prev"><i class="fas fa-chevron-left"></i></a></li>
        </ul> <!-- .cd-radial-slider-navigation -->
    </div> <!-- .cd-radial-slider-wrapper -->
</div>
