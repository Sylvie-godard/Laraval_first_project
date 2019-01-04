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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                
                <a class="navbar-brand" href="{{ url('/') }}">
                        <i class="fas fa-plus fa-lg"></i> @lang('Quidditch')
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    <a class="navbar-brand" href="{{ url('/profil') }}">
                        <i class="fas fa-plus fa-lg"></i> @lang('Mon Profil')
                    </a>
                    <a class="navbar-brand" href="{{ route('player.index') }}">
                        <i class="fas fa-plus fa-lg"></i> @lang('Joueurs')
                    </a>
                    @admin
                    <a class="navbar-brand" href="{{ route('user.index') }}">
                        <i class="fas fa-plus fa-lg"></i> @lang('Utilisateurs')
                    </a>
                    @endadmin
                    <a class="navbar-brand" href="{{ route('team.index') }}">
                        <i class="fas fa-plus fa-lg"></i> @lang('Equipes')
                    </a>
                   
                
            
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle{{(route('match.index'))}} navbar-brand" href="#" id="navbarDropdownGestCat" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            @lang('Match')
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownGestCat">
                            <a class="dropdown-item" href="{{ route('match.index') }}">
                                <i class="fas fa-plus fa-lg"></i> @lang('Matchs')
                            </a>
                            <a class="dropdown-item" href="/match/stats">
                                <i class="fas fa-plus fa-lg"></i> @lang('Statistiques')
                            </a>
                            @admin
                            <a class="dropdown-item" href="/match/paris">
                                <i class="fas fa-plus fa-lg"></i> @lang('Les Paris')
                            </a>
                            @endadmin
                        </div>
                    </li>
                    

                    @admin
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle{{(route('player.create'))}}" href="#" id="navbarDropdownGestCat" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    @lang('Administration')
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownGestCat">
                    <a class="dropdown-item" href="{{ route('player.create') }}">
                        <i class="fas fa-plus fa-lg"></i> @lang('Ajouter un Joueur')
                    </a>
                    <a class="dropdown-item" href="{{ route('match.create') }}">
                        <i class="fas fa-plus fa-lg"></i> @lang('Ajouter un Match')
                    </a>
                    <a class="dropdown-item" href="{{ route('team.create') }}">
                        <i class="fas fa-plus fa-lg"></i> @lang('Ajouter une Equipe')
                    </a>
                </div>
            </li>
            @endadmin

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Connexion') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Inscription') }}</a>
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
                                        {{ __('se déconnecter') }}
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
            @yield('content')
        </main>
    </div>
</body>
</html>
