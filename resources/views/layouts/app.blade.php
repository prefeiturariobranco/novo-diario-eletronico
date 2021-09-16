<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Diário Oficial Eletrônico do Ministério Público do Estado do Acre</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/all.css')}}">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="navbar-header">

                        <!-- Collapsed Hamburger -->
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <!-- Left Side Of Navbar -->
                        <ul class="nav navbar-nav">
                            @if (Auth::check())
                                <li><a href="/admin">Painel administrativo</a></li>
                                <li><a href="/usuarios">Usuários</a></li>
                            @endif
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                            @if (Auth::guest())
                                <li><a href="/admin">Entrar</a></li>
                            @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="/logout"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                Sair
                                            </a>

                                            <form id="logout-form" action="/logout" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row header">
            <div class="col-md-4 col-md-offset-2">
                <a href="/">
                    <img id="logo" src="/img/logo.png" alt="Logo" width="360" height="60">
                </a>
            </div>
            @if (Request::segment(1) !== 'login')
                <div class="col-md-4 results-filter">
                    <form action="/home">
                        <span>Filtrar por: </span>
                        <select name="mes">
                            @foreach (meses() as $mes => $mes_nome)
                                <option {{ $mes == (isset($mes_filtro)? $mes_filtro:date('m')) ? 'selected' : '' }} value="{{ $mes }}">{{ $mes_nome }}</option>
                            @endforeach
                        </select>
                        <select name="ano">
                            @foreach (anos() as $ano)
                                <option {{ $ano == (isset($ano_filtro)? $ano_filtro:date('Y')) ? 'selected' : '' }} value="{{ $ano }}">{{ $ano }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-xs btn-primary">Filtrar</button>
                    </form>
                </div>
            @endif
        </div>
        @yield('content')
    </div>
</div>

<!-- Scripts -->
<script src="/js/all.js"></script>
</body>
</html>


