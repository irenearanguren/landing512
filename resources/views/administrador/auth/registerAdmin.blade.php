 @if (session('message'))
            <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blu-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
            <span class="font-medium">Alerta:</span> {{ session('message') }}
            </div>
        @endif
    @section('catalogo')
    <div class="max-w-md mx-auto mt-10 bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold mb-4">Registro</h2>
        <form method="POST" action="">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700" for="name">Nombre</label>
                <input type="text" class="mt-1 block w-full border-gray-300 rounded-md" required name="name" id="name">
                <label class="block text-gray-700" for="email">email</label>
                <input type="email" class="mt-1 block w-full border-gray-300 rounded-md" required name="email" id="email">
                <label class="block text-gray-700" for="password">password</label>
                <input type="password" class="mt-1 block w-full border-gray-300 rounded-md" required name="password" id="password">
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded-md hover:bg-blue-700">Registrarse</button>
        </form>
        <p class="mt-4 text-center">¿ya tienes una cuenta? <a href="" class="text-blue-600 hover:underline">Iniciar sesion</a></p>
    </div> 
    @endsection