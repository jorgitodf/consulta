<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ route('home') }}">Laravel</a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li><a href="{{ route('home') }}">Página Inicial</a></li>
                @if (Auth::guest())
                @else
                    @if (Auth::user()->pes_permissao == 1)
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cadastro<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('paciente.alterar', Auth::user()->id_pessoa) }}">Alterar/Atualizar Dados</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="{{ route('paciente.alterar', Auth::user()->id_pessoa) }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Consultas<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="">Marcar</a></li>
                        </ul>
                    </li>
                    @endif
                    @if (Auth::user()->pes_permissao == 2)
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cadastros<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('paciente.index') }}">Pacientes</a></li>
                            <li><a href="{{ route('medico.index') }}">Médicos</a></li>
                            <li><a href="{{ route('admin.index') }}">Administrador</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="{{ route('paciente.alterar', Auth::user()->id_pessoa) }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Consultas<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="">Visualizar</a></li>
                            <li><a href="">Marcar</a></li>
                            <li><a href="">Alterar</a></li>
                        </ul>
                    </li>
                    @endif
                @endif
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->pes_nome }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('auth.logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>