<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/myStyle.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">

    @yield('optional_script')

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ route('viewHome') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row">
                    @if(Auth::check())
                        <div class="col-lg-4 myNav">
                            <ul class="list-group">
                                <a href="{{route('viewHome')}}"> <li class="list-group-item @yield('viewHome')"> <i class="fa fa-home" aria-hidden="true"></i> Home</li></a>
                                <a href="{{route('viewCreatePost')}}"><li class="list-group-item @yield('viewCreatePost')"> <i class="fa fa-comment" aria-hidden="true"></i> Create new post </li></a>
                                <a href="{{route('posts')}}"><li class="list-group-item @yield('posts')"> <i class="fa fa-tasks" aria-hidden="true"></i> All Posts </li></a>
                                <a href="{{route('posts.trashed')}}"><li class="list-group-item @yield('posts.trashed')"> <i class="fa fa-trash" aria-hidden="true"></i> All Trashed Posts </li></a>
                                <a href="{{route('categories')}}"><li class="list-group-item @yield('categories')"> <i class="fa fa-database" aria-hidden="true"></i> Categories </li></a>
                                <a href="{{route('category.create')}}"><li class="list-group-item @yield('category.create')"> <i class="fa fa-plus-circle" aria-hidden="true"></i> Create new category </li></a>
                                <a href="{{route('tags')}}"><li class="list-group-item @yield('tags')"> <i class="fa fa-tags" aria-hidden="true"></i> Tags </li></a>

                                @if(Auth::user()->admin)
                                    <a href="{{route('users')}}"><li class="list-group-item @yield('users')"> <i class="fa fa-users" aria-hidden="true"></i> Users </li></a>
                                    <a href="{{route('user.create')}}"><li class="list-group-item @yield('user.create')"> <i class="fa fa-user-plus" aria-hidden="true"></i> Create New User </li></a>
                                    <a href="{{route('settings')}}"><li class="list-group-item @yield('settings')"> <i class="fa fa-user-plus" aria-hidden="true"></i> Settings </li></a>
                                @endif

                                <a href="{{route('user.profile')}}"><li class="list-group-item @yield('user.profile')"> <i class="fa fa-wrench" aria-hidden="true"></i> My Profile </li></a>

                            </ul>
                        </div>
                        <div class="col-lg-8">
                            @yield('content')
                        </div>
                    @else
                        <div class="col-lg-12">
                            @yield('content')
                        </div>
                    @endif
                </div>
            </div>
        </main>
    </div>

    <!-- Custom JS -->
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script>
        @if(Session::has('success'))
            toastr.options.timeOut = 100;
            toastr.options.closeButton = true;
            toastr.success("{{ Session::get('success') }}", 'Alert', {timeOut: 2000})
        @endif

        @if(Session::has('info'))
            toastr.options.timeOut = 100;
            toastr.options.closeButton = true;
            toastr.info("{{ Session::get('info') }}", 'Alert', {timeOut: 2000})
        @endif
    </script>
</body>
</html>
