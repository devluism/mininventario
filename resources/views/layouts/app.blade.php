<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>
    <meta name="description" content="{{ config('app.desciption', 'Sistema Informacito - Minerven C.A.') }}">
    <link rel="icon" href="{{ asset('/resources/images/favicon/favicon.ico') }}">

    <meta name="robots" content="index, nofollow">
    <meta name="theme-color" content="#0f0f0f">
    <meta name="twitter:card" content="summary_large_image">
    <meta property="og:title" content="{{ config('app.name') }}" />
    <meta property="og:description" content="{{ config('app.desciption', 'Sistema Informacito - Minerven C.A.') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://sgi.minerven.com" />
    
    <meta property="og:image" content="/resources/images/logos/minerven-thumb-1200x630.png" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />

    <meta property="og:image" content="/resources/images/logos/minerven-thumb-400x400.png" />
    <meta property="og:image:width" content="400" />
    <meta property="og:image:height" content="400" />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    @yield('styles')

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{-- {{ config('app.short-name', 'MININVENTARIO') }} --}}
                    <img width="50" src="{{ Vite::image('logos/minerven-isotipo.png') }}" alt="Logo de Minerven">
                    <span class="d-none d-sm-inline fw-bold text-uppercase fs-6">Inventario</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('login') }}">{{ __('Ingresar') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('register') }}">{{ __('Regisrar') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <span class="text-white"><i class="fas fa-user me-2"></i>{{ Auth::user()->username }}</span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('dashboard.excel') }}">
                                        <i class="fas fa-file-excel me-1"></i>{{ __('Visor excel') }}
                                    </a>
                                    <a class="dropdown-item disabled" href="">
                                        <i class="fas fa-gear me-1"></i>{{ __('Opciones') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ url('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                       <i class="fas fa-arrow-left me-1"></i>{{ __('Cerrar sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ url('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main id="mainContent" class="py-4">
            <div id="toastElement" class="toast align-items-center border-0 position-fixed top-10 end-0 me-4 z-3" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        <i id="toastIcon" class="fas me-2"></i><span id="toastText"></span>
                    </div>
                    <button id="toastBtn" type="button" class="btn-close shadow-none me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
            @if (Session::has('message')) 
                <div id="toastMessage" class="toast align-items-center text-bg-{{ Session::get('status') }} border-0 position-fixed top-10 end-0 me-4 z-3" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                          <span><i class="fas fa-circle-{{ Session::get('icon') }} me-2"></i>{{ Session::get('message') }}</span>
                        </div>
                        <button id="toastBtn" type="button" class="btn-close shadow-none me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            @yield('content')
        </main>
    </div>

    <script type="module" defer>
        if ($('#toastMessage').length) {
            new Toast('#toastMessage', { delay: 3000 }).show();
        }
    </script>
    @yield('scripts')
</body>
</html>
