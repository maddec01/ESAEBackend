<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>

<nav class="navbar navbar-static-top navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <span class="navbar-brand"><a href="{{ route('index') }}"><strong>ESAE</strong>ISMT</a></span>
    </div>
    <ul class="nav navbar-nav">
        @if (Auth::guest())
            &nbsp;
        
        @else
		
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Cursos <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="{{ route('curso.index') }}">
                            Lista de Cursos
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('curso.create') }}">
                            Novo curso
                        </a>
                    </li>
                </ul>
            </li>
        
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Alunos <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="{{ route('aluno.index') }}">
                            Lista de alunos
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('aluno.create') }}">
                            Novo aluno
                        </a>
                    </li>
                </ul>
            </li>
        
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Avisos <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="{{ route('aviso.index') }}">
                            Lista de avisos
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('aviso.create') }}">
                            Novo aviso
                        </a>
                    </li>
                </ul>
            </li>
        
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Eventos <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="{{ route('evento.index') }}">
                            Lista de eventos
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('evento.create') }}">
                            Novo evento
                        </a>
                    </li>
                </ul>
            </li>
        
            <li><a href="{{ route('creditos') }}">Créditos</a></li>
        @endif
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <!-- Authentication Links -->
        @if (Auth::guest())
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
        
        @else
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
                
            </li>
        @endif
    </ul>
  </div>
</nav>