<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>@yield('title', 'Suntuario')</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='/css/app.css'>
    <!--la raiz / que es la carpeta publica en laravel-->
    <script src='/js/app.js' defer></script>
    <!--la raiz / que es la carpeta publica en laravel, el atributo defer para que se ejecute al final de la carga-->
</head>

<body>
    <div id="app" class="d-flex flex-column h-screen justify-content-between">
        <header>
            <nav class="navbar navbar-light bg-white navbar-expand-lg shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{route('home')}}">
                        {{config('app.name')}}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="/">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
                            @if(auth()->check())
                            <li class="nav-item"><a class="nav-link" href="/portfolio">Portfolio</a></li>
                                @if(auth()->user()->hasRoles(['admin']))
                                 <li class="nav-item"><a class="nav-link" href="{{route('usuarios.index')}}">Usuarios</a></li>
                                @endif
                            @endif
                            <li class="nav-item"><a class="nav-link" href="/contact">Contacto</a></li>                            
                            @guest
                            <!--guest =invitado -->
                            <li class="nav-item"><a class="nav-link" href="{{route('login')}}">Login</a></li>
                            @else
                            <li class="nav-item"><a class="nav-link" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Cerrar sesion</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{auth()->user()->name}}<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a class="nav-link" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Cerrar Sesion</a></li>
                                    <li><a href="#">Another action</a></li>
                                </ul>
                            </li>
                            @endguest                            
                        </ul>
                    </div>
                </div>
            </nav>
            <form id="logout-form" method="POST" action="{{route('logout')}}" style="display:none">
                @csrf
                <button>Cerrar sesión</button>
            </form>
            @include('partials.session-status')
        </header>
        <main class="py-4">
            @yield('content')
        </main>
        <footer class="bg-white text-black-50 text-center py-3 shadow">
            {{config('app.name')}} | copyright @ {{date('Y')}}
        </footer>
    </div>
</body>

</html>