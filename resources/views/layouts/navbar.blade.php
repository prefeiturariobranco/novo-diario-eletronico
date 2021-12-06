<nav class="navbar navbar-expand-lg navbar-dark " style=" background: #1289ea;">
    <div class="container col-md-10 p-0">
        <style>
            .hoveritem:hover{
                background-color: rgba(0, 0, 0, 0.66);
            }
        </style>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarsExample07">
            <ul class="navbar-nav mr-auto">
                @if(Auth::check())
                        <li class="nav-item">
                            <a class="nav-link  hoveritem font-weight-bold text-white" href="/admin">Painel administrativo</a>
                        </li>
                    @if (Auth::user()->admin==1)
                        <li class="nav-item  ">
                            <a class="nav-link hoveritem font-weight-bold text-white" href="/usuarios">Usuários</a>
                        </li>
                    @endif
                @endif
            </ul>
            <ul class="nav" style="margin-right: 30%">
                <li class="nav-item">
                    <h4 class="text-white font-weight-bold">Diário Oficial Eletrônico Municipal</h4>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li class="nav-item  hoveritem active"><a class="nav-link" href="/admin">Entrar</a></li>
                @else
                    <li class="nav-item active nav-item dropdown">
                        <a href="#" class="nav-link hoveritem dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li >
                                <a class="dropdown-item hoveritem" href="/logout"
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
