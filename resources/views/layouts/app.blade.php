<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Core -->
    <script src="{{ asset('js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('js/core/popper.min.js') }}"></script>

    <!-- Theme JS -->
    <script src="{{ asset('js/core/blk-design-system.min.js') }}"></script>

    <!-- icons -->
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="{{ asset('css/nucleo-icons.css') }}" rel="stylesheet">

    <!-- player -->
    <script src="https://unpkg.com/wavesurfer.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- sweet alert -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>


</head>
<body class="index-page">
    <div id="app">
        <nav class="navbar navbar-expand-lg fixed-top navbar-black" color-on-scroll="0">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                   <img src="{{asset('img/techsoundspluslogo.png')}}">
                </a>

                <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <div class="navbar-collapse-header">
                        <div class="row">
                            <div class="col-6 collapse-brand">
                                <a class="navbar-brand" href="{{ url('/') }}">
                                    <img src="{{asset('img/techsoundspluslogo.png')}}">
                                </a>
                            </div>
                            <div class="col-6 collapse-close text-right">
                                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <i class="tim-icons icon-simple-remove"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Authentication Links -->
                        <li class="nav-item{{ currentRoute(route('cart.index')) }}"><a class="nav-link" href="{{ route('cart.index') }}"><i class="tim-icons icon-cart"></i><span id="cart-items-count" class="badge badge-pill badge-primary">{{ Cart::count() }} </span><span id="cart-total" class="text-white" style="padding-left: 10px"> {{presentPrice(Cart::subtotal())}}</span></a></li>
                        @guest
                            <li class="nav-item{{ currentRoute(route('login')) }}"><a class="nav-link" href="{{ route('login') }}"></i>@lang('SIGN IN')</a></li>
                            @if (Route::has('register'))
                                <li class="nav-item{{ currentRoute(route('register')) }}"><a class="btn btn-primary btn-simple btn-round" href="{{ route('register') }}">@lang('GET STARTED')</a></li>
                            @endif
                        @else

                            <li class="nav-item{{route('profile.edit', auth()->id())}}">
                            </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="tim-icons icon-single-02"></i>{{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                        <i class="tim-icons icon-single-02"></i> @lang('Account')
                                    </a>

                                    @admin
                                    <a class="dropdown-item" href="{{ route('backoffice') }}">
                                        <i class="fas fa-plus fa-lg"></i> @lang('Backoffice')
                                    </a>
                                    @endadmin

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav><!-- end nav -->

        <div class="bg-spacer"></div>

        <main class="py-4">
            @yield('content')
        </main>


        <footer class="footer">
            <div class="container">
                <div class="spacer"></div>
                <div class="newsletter">
                    <div class="row">
                        <div class="col">
                        </div>
                        <div class="col-6">
                            <h3 class="text-center">Subscribe to our Newsletter</h3>
                            <form action="{{ route('newsletter.store') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="input-group">
                                    <input type="email" class="form-control form-control-newsletter" placeholder="sunlimetech@gmail.com" aria-label="Recipient's username" aria-describedby="button-addon2" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-info" type="submit" id="button-addon2"><i class="fa fa-paper-plane"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col">
                        </div>
                    </div>
                </div>
                <!-- Copyright -->
                <div class="footer-copyright text-center py-3">© 2019 Copyright:
                    <a href="#"> techsoundsplus.com</a>
                </div>
                <!-- Copyright -->
            </div>
        </footer>

        <div class="player-section" style="display: none;">
            <div class="spacer"></div>
            <div class="container">
                <div class="row">

                    <!-- player pause -->
                    <div class="col-sm-1">
                        <a id="pause" rel="nofollow" style="display: none;"><i class="fas fa-pause"></i></a>
                        <a id="play" rel="nofollow" style="display: block;"><i class="fas fa-play"></i></a>
                    </div>
                    <!-- waveform -->
                    <div class="col-sm-9">
                        <p id="loading" class="text-info" style="display: none">Loading sample ...</p>
                        <div id="wavesurfer" class="player"></div>
                    </div>
                    <!-- waveform -->
                    <!-- add to cart -->
                    <div class="col-sm-1">
                        <a id="cart-player" data-link="product-detail" rel="nofollow" data-product-id="2667"><i class="fas fa-shopping-cart"></i></a>
                    </div>
                    <!-- add to cart -->


                    <div class="col-sm-1 volume d-inline">
                        <a class="volume-button"><i class="fas fa-volume-up"></i></a>
                        <div class="volume-drop">
                            <input type="range" id="volume-slider" orient="vertical" class="volume-drop-range" min="0" max="100" step="1" value="50">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Scripts -->

    @yield('scripts')
    @include('sweetalert::alert')
</body>
</html>
