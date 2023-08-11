<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FavIcon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Asap+Condensed:wght@200;400&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    <script src="{{ asset('files/node_modules/jquery/dist/jquery.min.js') }}"></script>
</head>

<body>
    <div id="app">
        <!-- Sidebar -->
        <div class="sidebar" style="display">
            <a href="{{ route('dashboard') }}" class="logo">
                <i class='bx bxs-book-bookmark'></i>
                <div class="logo-name"><span>{{ config('app.name') }}</span>{{ config('app.subname', 'HR') }}</div>
            </a>
            <ul class="side-menu">
                @guest
                    <li><a href="{{ route('login') }}"><i class='bx bx-log-in-circle'></i>{{ __('Login') }}</a></li>
                    <li><a href="{{ route('register') }}"><i class='bx bx-user-pin'></i>{{ __('Register') }}</a></li>
                @else
                    <li><a href="{{ route('dashboard') }}"><i class='bx bxs-dashboard'></i>{{ __('Dashboard') }}</a></li>
                    <li><a href="#"><i class='bx bx-store-alt'></i>{{ __('Shop') }}</a></li>
                    <li><a href="#"><i class='bx bx-analyse'></i>{{ __('Analytics') }}</a></li>
                    <li><a href="#"><i class='bx bx-message-square-dots'></i>{{ __('Tickets') }}</a></li>
                    <li><a href="#"><i class='bx bx-group'></i>{{ __('Users') }}</a></li>
                    <li><a href="{{ route('settings') }}"><i class='bx bx-cog'></i>{{ __('Settings') }}</a></li>
                @endguest
            </ul>
            @guest
            @else
                <ul class="side-menu">
                    <li>
                        <a href="{{ route('logout') }}" class="logout"
                            onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                            <i class='bx bx-log-out-circle'></i>
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            @endguest
        </div>
        <!-- End of Sidebar -->

        <!-- Main Content -->
        <div class="content">
            <!-- Navbar -->
            <nav>
                <i class='bx bx-menu'></i>
                <form action="">
                    @guest
                    @else
                    <div class="title-page-header">
                        <i class='icon bx '></i>
                        <span class="info">
                            <h1 id="title-page-nav"></h1>
                        </span>
                    </div>
                    @endguest
                    <div class="form-input" style="display:none">
                        <input type="search" placeholder="{{ __('Search') }}">
                        <button class="search-btn" type="submit"><i class='bx bx-search'></i></button>
                    </div>
                </form>
                <input type="checkbox" id="theme-toggle" hidden>
                <label for="theme-toggle" class="theme-toggle"></label>
                @guest
                @else
                    <a href="#" class="notif">
                        <i class='bx bx-bell'></i>
                        <span class="count">12</span>
                    </a>
                @endguest
                <a href="#" class="profile">
                    <img src="{{ asset('img/LOGO HR.png') }}" alt="">
                </a>
            </nav>

            <!-- End of Navbar -->

            <main>
                @yield('content')
            </main>

        </div>
    </div>
    <script src="{{ asset('js/master.js') }}" defer></script>
    <script src="{{ asset('js/global.js') }}" defer></script>
</body>

</html>
