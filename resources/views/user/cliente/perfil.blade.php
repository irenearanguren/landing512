@extends('user/layout_cliente')
@section('title', 'Cliente')
@section('cabecera')
    <img src="" alt="">
    <div class="max-w-6xl mx-auto p-10 bg-blue-300 rounded-sm text-center ">
        <h1>editar perfil</h1>
    </div>
@endsection
@section('cuerpo')
    <div>
        <h2>editar perfil</h2>
        <form action="{{ route(user . editarPerfil) }}">
            <div>
                <label for="name"></label>
                <input type="text" name="name" id="name" placeholder="name">
            </div>
            <div>
                <label for="email"></label>
                <input type="text" name="email" id="email" placeholder="email">
            </div>
            <div>
                <label for="password"></label>
                <input type="text" name="password" id="password" placeholder="password">
            </div>
            <div>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Enviar</button>
            </div>
        </form>
    </div>
@endsection
