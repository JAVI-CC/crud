<html>
<title>Calderas S.L - @yield('title')</title>

<head>
    <!-- CSS -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" >

    <meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- Scripts -->
    <script src="{{ asset('js/usuarios.js') }}" defer></script>
    <script src="{{ asset('js/productos.js') }}" defer></script>
    <script src="{{ asset('js/entregas.js') }}" defer></script>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="/">Calderas S.L</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item">
      <a class="nav-link text-white boton-login" href="/">Login</a>
    </li>
      <li class="nav-item">
      <a class="nav-link text-white boton-login" href="/productos">Productos</a>
      </li>
      <li class="nav-item">
      <a class="nav-link text-white boton-entrega" href="/entrega">Entrega</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <a href="/login" class="btn btn-outline-light my-2 my-sm-0" id="login-laravel">Iniciar sesión</a>
      <a href="/register" class="btn btn-outline-light my-2 my-sm-0" id="register-laravel">Registrarse</a>
    </form>
  </div>

  @guest             
    @if (Route::has('register'))
   @endif
      @else
      
            <a class="nav-link text-white boton-login">{{ Auth::user()->name }}</a>
            <a href="/logout" class="btn btn-outline-light my-2 my-sm-0" id="logout-laravel">Cerrar sesión</a>
            <script>
                document.getElementById("login-laravel").style.display = "none";
                document.getElementById("register-laravel").style.display = "none";
            </script>
  @endguest

</nav>
    @yield('content')

    