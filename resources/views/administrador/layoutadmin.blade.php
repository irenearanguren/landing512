<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Amin</title>
     <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>

<body>
    @if (session('message'))
            <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blu-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
            <span class="font-medium">Alerta:</span> {{ session('message') }}
            </div>
        @endif
    <header>
        @yield('cabecera')

    </header>
    <main class="md:container min-h-screen max-w-6xl flex">
        @auth
        <section class="relative flex h-screen mx-auto">
            <aside class="relative w-64 bg-gray-100">
                <div class="p-6">
                    <h1 class="text-xl font-bold mb-4">administrador</h1>
                    <nav class="space-y-2">

                        <a href="{{ Route('admin.dashboard') }}"
                            class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded">Incio</a>


                        <a href="{{ Route('admin.products') }}"
                            class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded">
                            <span class="mr-3">
                                Nuevo Producto
                            </span>
                        </a>
                        <a
                            href="{{ Route('admin.categories') }}"class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded">
                            <span class="mr-3">
                                Categorias
                            </span>
                        </a>
                        <a
                            href=" "class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded">
                            <span class="mr-3">
                                Usuarios
                            </span>
                            
                        </a>
                        <a href="{{ Route('admin.orders') }}"
                            class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded" >
                                                    
                        <span>
                            Ordenes
                        </span>
                    </a>

                    <hr class="my-2 border-gray-300">
                    <a href="{{ route('client.logout') }}" class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded">
                        <span class="mr-3">
                        </span>
                        <span>salir</span>
                    </a>
                </nav>
            </div>
            
        </aside>

            <script>
                /*          function mostrarFormulario(formularioId) {

                       document.querySelectorAll('.formulario').forEach(form => {
                            form.style.display = 'none';
                        });

                        document.getElementById(formularioId).style.display = 'block';
                    }  */


                function modalProductosAbir() {
                    const modal = document.getElementById('formProductos');
                    modal.classList.remove('hidden')

                }

                function modalProductosCerrar() {
                    const modal = document.getElementById('formProductos');
                    modal.classList.add('hidden')
                }

            </script>
    </section>
    

    <section class="w-full h-screen ">
    <div class=" overflow-y-auto p-4 ">
        @yield('tabla')
    </div>
</section>
@endauth
</main>
</body>
</html>