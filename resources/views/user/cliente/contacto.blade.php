@extends('user/layout_cliente')
@section('title', 'Cliente')
@section('cabecera')
<img src="" alt="">
<div class="max-w-6xl mx-auto p-10 bg-blue-300 rounded-sm text-center ">
    <h1>contacto con el administrador</h1>
</div>
@endsection

@section('cuerpo')
<div class="max-w-6xl mx-auto p-10 bg-white rounded-sm">
    <h2 class="text-2xl font-bold mb-4">Contacto</h2>
    <form action="{{ route('user.enviarcomentario') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
            <input type="text" name="name" id="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
            <input type="email" name="email" id="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>
        <div>
            <label for="message" class="block text-sm font-medium text-gray-700">Mensaje</label>
            <textarea name="message" id="message" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
        </div>
        <div>
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Enviar</button>
        </div>
    </form>
</div>
@endsection