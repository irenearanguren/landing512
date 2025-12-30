@extends('administrador.layoutAdmin')
@section('tabla')
   <form method="POST" action="{{ route('admin.products.addImage', $producto->id) }}" enctype="multipart/form-data">
    @csrf
    <label for="imagen1" class="block text-gray-700 font-medium mb-2 w-full text-left">Imagen:</label>
    <input type="file" id="imagen1" name="imagen1"
        class="mb-4 border border-gray-300 rounded-md px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
    <label for="imagen2" class="block text-gray-700 font-medium mb-2 w-full text-left">Imagen:</label>
    <input type="file" id="imagen2" name="imagen2"
        class="mb-4 border border-gray-300 rounded-md px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
    <label for="imagen3" class="block text-gray-700 font-medium mb-2 w-full text-left">Imagen:</label>
    <input type="file" id="imagen3" name="imagen3"
        class="mb-4 border border-gray-300 rounded-md px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">

    <input type="submit" value="Guardar" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">

</form> 
@endsection

