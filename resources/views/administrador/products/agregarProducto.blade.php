@extends('administrador.layoutAdmin')
@section('title', 'Agregar Nuevo Producto')
@section('tabla')
    

<form method="POST" class="bg-white rounded-lg shadow-lg pt-8 p-4 mt-10 w-full max-w-md flex flex-col items-center"
            action="{{ route('admin.products.create') }}">
            @csrf
            <h1 class="text-xl font-bold  mt-10 text-gray-800">Agregar Producto</h1>

            <label for="codigo" class="block text-gray-700 font-medium mb-2 w-full text-left">Código:</label>
            <input type="text" id="codigo" name="codigo"
                class="mb-4 border border-gray-300 rounded-md px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">

            <label for="nombre" class="block text-gray-700 font-medium mb-2 w-full text-left">Nombre:</label>
            <input type="text" id="nombre" name="nombre"
                class="mb-4 border border-gray-300 rounded-md px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">

            <label for="descripcion" class="block text-gray-700 font-medium mb-2 w-full text-left">Descripción:</label>
            <input type="text" id="descripcion" name="descripcion"
                class="mb-4 border border-gray-300 rounded-md px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">

            <label for="oferta" class="block text-gray-700 font-medium mb-2 w-full text-left">Oferta en $:</label>
            <input type="text" id="oferta" name="oferta"
                class="mb-4 border border-gray-300 rounded-md px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">

            <label for="categoria" class="block text-gray-700 font-medium mb-2 w-full text-left">categoria:</label>
            <input type="text" id="categoria" name="categoria"
                class="mb-4 border border-gray-300 rounded-md px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">

            <label for="estado" class="block text-gray-700 font-medium mb-2 w-full text-left">Estado:</label>
            <select name="estado" id="estado"
                class="mb-4 border border-gray-300 rounded-md px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="disponible">Disponible</option>
                <option value="agotado">Agotado</option>
                <option value="nuevo">Nuevo</option>
            </select>
    <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" value="Agregar Producto">
</form>
@endsection