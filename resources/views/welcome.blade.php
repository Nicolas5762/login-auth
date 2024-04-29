<!DOCTYPE html>
<meta name="Nicolas" content="Nicolas, Alfonso, Manrique, Martinez">
    <meta name="Fecha" content="29-abril-2024">
    <meta name="semestre" content="4">
    <meta name="programa" content="Tec desarrollo de software">
    <meta name="profesor" content="mario porras">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
        }

        /* Encabezado */
        .header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: right;
        }

        .header a {
            color: #fff;
            text-decoration: none;
            margin-left: 20px;
            transition: color 0.3s ease;
        }

        .header a:hover {
            color: #ccc;
        }

        /* Contenido principal */
        .main-content {
            max-width: 800px;
            margin: 40px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        /* Bienvenida */
        .welcome {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }
    </style>
</head>
<body class="antialiased">
    <div class="header">
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        @endif
    </div>

    <div class="main-content">
        <div class="welcome">
            @guest
                ¡Bienvenido! Por favor, inicia sesión o regístrate para acceder a nuestros servicios.
            @endguest
        </div>
        <!-- Contenido principal -->
        @yield('content')
    </div>
</body>
</html>