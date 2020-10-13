<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SCM BulletinBoard</title>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white">
            <a class="navbar-brand" href="#"><h2>SCM Bulletin Board</h2></a>
            <button type="button" class="navbar-toggler ml-auto" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            @guest
            @else
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav">
                    @if(Auth::user()->type==0)
                        <a class="nav-item nav-link" href="{{ route('users.index') }}"><i class="fa fa-users" aria-hidden="true"></i> Users </a>
                    @endif 
                    <a href="{{ route('users.show', Auth::user()->id) }}" class="nav-item nav-link"><i class="fa fa-id-card" aria-hidden="true"></i>{{Auth::user()->name}}'s Profile</a>
                   
                    <a class="nav-item nav-link" href="{{ route('posts.index') }}"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> Posts</a>
                </div>
            @endguest
                <div class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @else
                    <span class="nav-item nav-link m-auto"><i class="fa fa-user" aria-hidden="true"></i>{{ Auth::user()->name }}</span>
                    <a href="{{ route('logout') }}" class="nav-item nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit(); "><i class="fa fa-sign-out" aria-hidden="true"></i>{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf 
                    </form>
                @endguest
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        @guest
        <div class="fixed-bottom">
         @endguest
            <div class="d-flex justify-content-between padding-top: 90px;">
                <div class="ml-5">
                <p class="text-secondary">Seattle Consulting Myanmar</p>
                </div>
                <div class="mr-5">
                <p class="text-secondary">@Copyright</p>
                </div>
            </div>

        </div>
    </div>
</body>
</html>
