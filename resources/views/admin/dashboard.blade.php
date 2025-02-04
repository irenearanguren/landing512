<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Amin</title>
    <link rel="stylesheet" href="{{ asset('css/tailwind.min.css') }}">
    <script>
        function mostrarFormulario(formularioId) {
            
            document.querySelectorAll('.formulario').forEach(form => {
                form.style.display = 'none';
            });
            
            document.getElementById(formularioId).style.display = 'block';
        }
    </script>
</head>
<body>
<div class="flex h-screen">
<aside class="w-64 bg-white h-screen shadow-md flex flex-col justify-between">
    <div class="p-6">
        <h1 class="text-xl font-bold mb-4">Operador Menu</h1>
        <nav class="space-y-2">
            <a href="#" class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded" onclick="mostrarFormulario('formInicio')">
                <span class="mr-3">

                </span>
                <span>Inicio</span>
            </a>
            <a href="#" class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded" onclick="mostrarFormulario('formProductos')">
                <span class="mr-3">
                </span>
                <span>Productos</span>
            </a>
            <a href="#" class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded" onclick="mostrarFormulario('formCategorias')">
                <span class="mr-3">
    
                </span>
                <span>Categorias</span>
            </a>
            <a href="#" class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded" onclick="mostrarFormulario('reporteForm')">
                <span class="mr-3">
                    
                </span>
                <span>Config</span>
            </a>
            <hr class="my-2 border-gray-300">
            <a href="#" class="flex items-center p-2 text-gray-700 bg-gray-100 rounded">
                <span class="mr-3">
                    
 
                </span>
                <span>Banner</span>
            </a>
            <a href="#" class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded">
                <span class="mr-3">
                    

                </span>
                <span>Anuncio</span>
            </a>
            <hr class="my-2 border-gray-300">
            <a href="#" class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded">
                <span class="mr-3">
                </span>
                <span>salir</span>
            </a>
        </nav>
    </div>
    
    <div class="p-4 text-center text-gray-500">
        <p>Diseñado por:</p>
    </div>
</aside>

    <div class="flex-1 overflow-y-auto formulario" id="formInicio" style="display: none;">
        <div>
            <div class="sm:flex sm:justify-center">
                <div class="flex flex-col shadow-secondary-1 dark:bg-surface-dark sm:shrink-0 sm:grow sm:basis-0 sm:rounded-e none">
                    <input type="text" name="producto_estatus" id="estatus">
                    <div class="p-4">
                        <table>
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th class="px-6 py-4">
                                codigo
                            </th>
                            <th class="px-6 py-4">
                                nombre
                            </th>
                            <th class="px-6 py-4">
                                estatus
                            </th>
                            </tr>
                        </table>
                        <p class="mb-4">descripcion de la tarjeta</p>
                    </div>
                </div>
        </div>
    </div>
</div>

<div class="flex-1 overflow-y-auto formulario" id="formProductos" style="display: none;">
     <form method="post"  class="flex flex-col items-center">
         <label for="codigo">Codigo:</label>
         <input type="text" id="codigo" name="codigo" class="mb-4 border border-gray-300">

         <label for="imagen">Imagen:</label>
         <input type="image" id="imagen" name="imagen" class="mb-4 border border-gray-300">

         <label for="nombre">Nombre:</label>
         <input type="text" id="nombre" name="nombre" class="mb-4 border border-gray-300">

         <label for="descripcion"> Descripcion:</label>
         <input type="text" id="descripcion" name="descripcion" class="mb-4 border border-gray-300">

         <label for="oferta">Oferta en $:</label>
         <input type="text" id="oferta" name="oferta" class="mb-4 border border-gray-300">

         <label for="peso">Peso:</label>
         <input type="text" id="peso" name="peso" class="mb-4 border border-gray-300">

         <label for="estado">Estado:</label>
         <select name="estado" id="estado">
             <option value="disponible">Disponible</option>
             <option value="agotado">Agotado</option>
             <option value="nuevo">Nuevo</option>
            </select><br><br>

         <input type="submit" value="Agregar Producto" class="px-4 mb-4 ">
         <input type="submit" value="Actualizar" class="px-4 ">
         <input type="submit" value="Eliminar" class="px-4 ">
         <input type="submit" value="Buscar" class="px-4 ">
    </form>
</div>
   
    <form method="post" id="formCategorias" class="formulario" style="display: none;">
        <label for="categoria">Categoría:</label>
        <input type="text" id="categoria" name="categoria"><br><br>
        <input type="submit" value="Agregar Categoría">
    </form>

</div>
</div>

</body>

