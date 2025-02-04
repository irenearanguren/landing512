@extends('layout')

    @if ($errors->any())
        <div>
            <strong>Error:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @section('catalogo')
    <div class="max-w-md mx-auto mt-10 bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold mb-4">Login</h2>
        <form method="POST" action="/clientlogin">
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
        <p class="mt-4 text-center">¿No tienes una cuenta? <a href="/register" class="text-blue-600 hover:underline">Regístrate</a></p>
    </div>
    @endsection