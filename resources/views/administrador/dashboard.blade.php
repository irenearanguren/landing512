@extends('administrador/layoutadmin')

{{-- @if (session('message'))
    <div role="alert"
        class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400">
        <span>{{ session('message') }}</span>
    </div>
@endif --}}

@section('cabecera')
    <div class="w-full mx-auto p-10 rounded-sm text-center">
        <h1 class="text-2xl font-bold mb-4">Panel Administrador</h1>

        @guest
            <p class="text-gray-700 text-sm font-bold mb-2">Por favor, inicie sesión para acceder al panel de administración.</p>
            @include('administrador.auth.loginAdmin')
        @endguest
        @auth
        </div>
        <div class="h-1/8 mb-4 w-full">
            <div class="w-full">
                <h3 class="text-xl font-bold mb-4">precio de referencia</h3>
            </div>
            <div class=" p-4 flex">
                <form action="" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    @csrf
                    <label for="precio" class="text-gray-700 text-sm font-bold mb-2">referencia:</label>
                    <input type="number" name="precioRef" id="precioRef"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar</button>
                </form>
            </div>
            <div>
                <p class="text-gray-700 text-sm font-bold mb-2">Precio Actual: </p>
            </div>
        </div>
    @endauth
@endsection

@section('tabla')
    <div class="max-w mx-auto mb-8">
        <h2 class="text-xl font-bold mb-4">Lista de Productos</h2>
        <br>
        <br>
        <div class="overflow-x-auto rounded-lg shadow">
            <table class="min-w-full bg-white divide-y divide-gray-200">
                <thead class="bg-blue-500">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Código</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Nombre</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Descripción
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Precio</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Categoria
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Estado</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Acciones
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($productos as $producto)
                        <tr>
                            <td class="hidden">{{ $producto->id }}</td>
                            <td class="hidden"><span class="edit-id">{{ $producto->id }}</span></td>
                            <td class="border px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                <input type="text" class="edit-code hidden" name="code" value="{{ $producto->code }}">
                                <p class="view-code">{{ $producto->code }}</p>
                            </td>
                            <td class="border px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                <input type="text" class=" edit-name hidden" name="name" value="{{ $producto->name }}">
                                <p class="view-name">{{ $producto->name }}</p>
                            </td>
                            <td class="border px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                <input type="text" class=" edit-desc hidden" name="desc" value="{{ $producto->desc }}">
                                <p class="view-desc">{{ $producto->desc }}</p>
                            </td>
                            <td class="border px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                <input type="text" class=" edit-pric hidden" name="pric" value="{{ $producto->pric }}">
                                <p class="view-pric">{{ $producto->pric }}</p>
                            </td>
                            <td class="border px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                <input type="text" class=" edit-cat hidden" name="cat" value="{{ $producto->cat_id }}">
                                <p class="view-cat">{{ $producto->cat_id }}</p>
                            </td>
                            <td class="border px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                <input type="text" class=" edit-stat hidden" name="stat" value="{{ $producto->stat }}">
                                <p class="view-stat">{{ $producto->stat }}</p>
                            </td>
                            <td class="border px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                <a onclick="abrirModalImagenes({{ $producto->id }})" type="button"
                                    class="view-btn text-blue-500 hover:underline">Ver</a>
                                <button type="button" class="edit-btn text-blue-500 hover:text-green-500 ml-2 ">Editar</button>
                                <input type="submit" class="save-btn hidden text-blue-500 hover:underline " value="Guardar">
                                <input type="button" class="cancel-btn hidden text-blue-500 hover:underline "
                                    value="Cancelar">
                            </td>
        </div>
    {{--         <form action="{{ route('products.destroy', $producto->id) }}" method="POST" class="inline-block">
            @csrf
            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md">Eliminar</button>
        </form> --}}

    </tr>
    @include('administrador.products.verImagen')
    
    @endforeach
    </tbody>
    </table>
    <!-- paginacion -->
    <div class="flex justify-center mt-4">
        {{ $productos->onEachSide(1)->links('pagination::tailwind') }}
    </div>
</div>

    <script>

        document.querySelectorAll('.edit-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const row = btn.closest('tr');
                row.querySelector('.view-code').classList.add('hidden');
                row.querySelector('.view-name').classList.add('hidden');
                row.querySelector('.view-desc').classList.add('hidden');
                row.querySelector('.view-pric').classList.add('hidden');
                row.querySelector('.view-cat').classList.add('hidden');
                row.querySelector('.view-stat').classList.add('hidden');
                row.querySelector('.view-btn').classList.add('hidden');
                row.querySelector('.edit-name').classList.remove('hidden');
                row.querySelector('.edit-desc').classList.remove('hidden');
                row.querySelector('.edit-pric').classList.remove('hidden');
                row.querySelector('.edit-cat').classList.remove('hidden');
                row.querySelector('.edit-stat').classList.remove('hidden');
                row.querySelector('.save-btn').classList.remove('hidden');
                row.querySelector('.cancel-btn').classList.remove('hidden');
                btn.classList.add('hidden');
            });
        });

        document.querySelectorAll('.cancel-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const row = btn.closest('tr');
                row.querySelector('.view-code').classList.remove('hidden');
                row.querySelector('.view-name').classList.remove('hidden');
                row.querySelector('.view-desc').classList.remove('hidden');
                row.querySelector('.view-pric').classList.remove('hidden');
                row.querySelector('.view-cat').classList.remove('hidden');
                row.querySelector('.view-stat').classList.remove('hidden');
                row.querySelector('.edit-name').classList.add('hidden');
                row.querySelector('.edit-desc').classList.add('hidden');
                row.querySelector('.edit-pric').classList.add('hidden');
                row.querySelector('.edit-cat').classList.add('hidden');
                row.querySelector('.edit-stat').classList.add('hidden');
                row.querySelector('.save-btn').classList.add('hidden');
                row.querySelector('.cancel-btn').classList.add('hidden');
                row.querySelector('.edit-btn').classList.remove('hidden');
            });
        });

        document.querySelectorAll('.save-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const row = btn.closest('tr');
                const id = row.querySelector('.edit-id').textContent.trim();
                const cod = row.querySelector('.edit-code').value.trim();
                const name = row.querySelector('.edit-name').value;
                const desc = row.querySelector('.edit-desc').value;
                const price = row.querySelector('.edit-pric').value;
                const cat = row.querySelector('.edit-cat').value;
                const stat = row.querySelector('.edit-stat').value;

                fetch(`/admin/productos/${id}/editar`, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            name: name,
                            desc: desc,
                            pric: pric,
                            cat: cat,
                            stat: stat
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            row.querySelector('.view-code').textContent = cod;
                            row.querySelector('.view-name').textContent = name;
                            row.querySelector('.view-desc').textContent = desc;
                            row.querySelector('.view-pric').textContent = pric;
                            row.querySelector('.view-cat').textContent = cat;
                            row.querySelector('.view-stat').textContent = stat;
                            row.querySelector('.cancel-btn').click();
                        } else {
                            alert('Error al actualizar');
                        }
                    })
                    .catch(() => alert('Error de red'));
            });
        });
    </script>
@endsection
