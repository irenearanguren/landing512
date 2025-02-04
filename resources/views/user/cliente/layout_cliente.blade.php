<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/tailwind.min.css') }}">
    <title>@yield('title')</title>
</head>

<body class="min-h-screen flex flex-col sm:container sm:mx-auto sm:mt-3 bg-gray-100">
    <header>
        @yield('cabecera')
        <div class=" sm:items-center max-w-6xl mx-auto">
            <nav class="bg-blue-100 min-w-full">
                <ul class="flex justify-end ">
                <li><a class="text-blue-600 hover:text-white mr-4 " href="/cliente/dashboard">inicio</a></li>
                <li><a class="text-blue-600 hover:text-white mr-4 "href="/cliente/contacto">contacto</a></li>
                <li><a class="text-blue-600 hover:text-white mr-4 "href="/cliente/perfil">perfil</a></li>
                <li><a class="text-red-600 hover:text-white mr-4 "href="/cliente/logout">cerrar sesion</a></li>
                </ul>
            </nav>
        </div>
        
    </header>
    <section class="md:container min-h-screen">
        @yield('cuerpo')
    </section>
    

</body>

</html>
