<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('titulo_pagina')</title>
        <link rel="stylesheet" href="{{ asset('css/tailwind.min.css') }}">

    </head>

    <body class="min-h-screen flex flex-col sm:container sm:mx-auto sm:mt-3 bg-gray-100">
        <header class="bg-blue-600 text-white p-4">
            @yield('cabecera')
        </header>
        <div class="bg-gray-800">
            <nav class="md:flex md:justify-end max-w-6xl mx-auto sm:px-6 lg:px-8 py-4">
                <ul class="flex justify-end">
                    <li class="list-none mr-4">
                        <a href="/login" class="text-blue-600 hover:text-white">Iniciar sesión</a>
                    </li>
                    <li class="list-none">
                        <a href="/register" class="text-blue-600 hover:text-white">Registrarse</a>
                    </li>
                </ul>
            </nav>
        </div>
        <section class="flex-grow p-4">
            @yield('catalogo')
        </section>
        <footer class="w-full max-w-6xl mx-auto bg-blue-600 text-white text-center p-6 sm:mt-10">
            <p class="text-sm w-full">&copy; 2023 Mi Aplicación. Todos los derechos reservados.</p>
        </footer>
    </body>
</html>

