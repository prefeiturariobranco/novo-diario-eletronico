
<nav class="navbar navbar-expand-lg navbar-dark " style=" background: linear-gradient(to right, #1289ea, #4ca2cd);">
    <div class="container col-md-10 p-0">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="navbarsExample07">
            <ul class="navbar-nav mr-auto">
                @if(Auth::check())
                    @if (Auth::user()->admin==1)
                        <li class="nav-item active">
                            <a class="nav-link" href="/admin">Painel administrativo</a>
                        </li>
                        <li class="nav-item active ">
                            <a class="nav-link" href="/usuarios">Usuários</a>
                        </li>
                    @endif
                @endif
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li class="nav-item active"><a class="nav-link" href="/admin">Entrar</a></li>
                @else
                    <li class="nav-item active nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li >
                                <a class="dropdown-item" href="/logout"
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
</nav>
