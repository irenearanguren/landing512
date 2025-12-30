<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>@yield('title')</title>
</head>
<body>
    <header>
        @guest
        <div class="bg-gray-800 p-4 text-white text-center shadow-md">
                    <img src="@yield('image')" alt="">
        <h1 class="text-3xl font-bold text-center ">@yield('titlePage')</h1>
        <p class="text-center">@yield('descriptionMain')</p>
        </div>
        @endguest
        @auth
        <div class="">
            <nav class="flex space-x-4 justify-center my-4">
                <a href="{{ route('index.client')}}" class="text-blue-500 hover:underline">Inicio</a>
                <!-- <a href="" class="text-blue-500 hover:underline">Productos</a> -->
                <a href="{{ route('user.order')}}" class="text-blue-500 hover:underline">Carrito</a>
                <!-- <a href="" class="text-blue-500 hover:underline">Mis Ordenes</a>-->
                <!-- <a href="" class="text-blue-500 hover:underline">Mi Perfil</a> -->
                <a href="{{ route('client.logout')}}"  class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600" > @yield('buttonText') </a>
        </nav>
        </div>
        
        @endauth
    </header>
    <div class="container mx-auto">
        @yield('section1')
    </div>
    <div class="container mx-auto">
        @yield('section2')
    </div>
    <footer class="text-center mt-8 p-4 bg-gray-100">
         <div class="bg-gray-800 p-6 mb-4 text-white text-center shadow-md">
        <h1 class="text-3xl font-bold text-center ">@yield('titleFoot')</h1>
        <p class="text-center">@yield('descriptionMain')</p>
        </div>
        <p>&copy; {{ date('Y') }} @yield('title')</p>

</body>
</html>