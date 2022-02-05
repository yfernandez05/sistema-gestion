<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="component">
        <div class="container-fluid p-0">
            <div class="navigation">
                <ul >
                    <li class="oneMenu">
                        <a href="#">
                            <span class="icon"><i class="fas fa-shipping-fast"></i></span>
                            <span class="title font-weight-bold">SISTEMA GESTIÓN</span>
                        </a>
                    </li>
                    <li>
                        <router-link :to="{name: 'spa'}">
                            <span class="icon"><i class="fas fa-home"></i></span>
                            <span class="title">Resumen</span>
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{name:'spa.cliente'}">
                            <span class="icon"><i class="fas fa-home"></i></span>
                            <span class="title">Clientes</span>
                        </a>
                    </li>
                    <li class="submenuList">
                        <a href="#">
                            <span class="icon"><i class="fas fa-user-cog"></i></span>
                            <span class="title">Administración</span>
                        </a>
                        <ul>
                            <li>
                                <router-link :to="{name: 'spa.user'}">
                                    <span class="icon"><i class="fas fa-user-cog"></i></span>
                                    <span class="title">Registros</span>
                                </router-link>
                            </li>
                            <li>
                                <router-link :to="{name: 'spa.user'}">
                                    <span class="icon"><i class="fas fa-user-cog"></i></span>
                                    <span class="title">Subemnu2</span>
                                </router-link>
                            </li>
                            <li>
                                <router-link :to="{name: 'spa.user'}">
                                    <span class="icon"><i class="fas fa-user-cog"></i></span>
                                    <span class="title">Submenu3</span>
                                </router-link>
                            </li>
                        </ul>

                    </li>                    
                    <li>
                        <a href="#">
                            <span class="icon"><i class="fas fa-user-shield"></i></span>
                            <span class="title">Customer</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon"><i class="fas fa-store"></i></span>
                            <span class="title">Ayuda</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon"><i class="fas fa-file-alt"></i></span>
                            <span class="title">Ajustes</span>
                        </a>
                    </li>
                    <li class="dropdown-submenu">
                        <a tabindex="-1" href="#">More options</a>
                        <ul class="dropdown-menu">
                            ...
                        </ul>
                    </li>
                </ul>

            </div>

            <!-- main -->
            <div class="main">
                <div class="topbar">
                    <div class="toggle">
                        <i class="fas fa-bars"></i>
                    </div>
                    <!-- Buscador -->
                    <div class="search">
                        <label>
                            <input type="text" placeholder="Buscar aqui">
                            <i class="fas fa-search"></i>
                        </label>
                    </div>
                    <!-- Usuario perfil -->
                    <div>
                        <!-- <div class="user">
                        <img src="http://lentesocialmagazine.com/wp-content/uploads/2019/10/avatar-user-computer-icons-software-developer-avatar-981c07f6af5d56836fa1c9825f4872a7.png" alt="">
                    </div> -->
                        <a id="navbarDropdown" class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <div class="user">
                                <img src="http://lentesocialmagazine.com/wp-content/uploads/2019/10/avatar-user-computer-icons-software-developer-avatar-981c07f6af5d56836fa1c9825f4872a7.png" alt="">
                            </div>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item">OTROS </a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>

                <!-- contenido -->
                @yield('contentboy')
                <router-view></router-view>
            </div>
        </div>
    </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>