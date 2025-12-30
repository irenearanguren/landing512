
    <div class="max-w-md mx-auto mt-10 bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold mb-4">Iniciar Sesion</h2>
        <form method="POST" action="{{ route('client.login') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700" for="email">Correo Electrónico</label>
                <input type="email" class="mt-1 block w-full border-gray-300 rounded-md" required name="email" id="email">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700" for="password">Contraseña</label>
                <input type="password" class="mt-1 block w-full border-gray-300 rounded-md" required name="password" id="password">
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded-md hover:bg-blue-700">Iniciar Sesión</button>
        </form>
{{--         @if ($errors->has('login'))
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <span class="font-medium">Alerta:</span> {{ $errors->first('login') }}
            </div>
        @endif --}}

    </div>
