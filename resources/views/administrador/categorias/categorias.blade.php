@extends('administrador/layoutadmin')
@section('title', 'Categorias')
@section('cabecera')
    <img src="" alt="">
    <div class=" mx-auto p-10 bg-blue-300 rounded-sm text-center ">
        <h1>Categorias</h1>
    </div>
    <div>
        <!-- Formulario de búsqueda -->
        <form method="GET" action="" class="flex flex-col md:flex-row gap-4 mb-6">
            <div>
                <label for="rif_cab" class="block text-sm font-medium text-gray-700">RIF</label>
                <input type="text" id="rif_cab" name="rif_cab" value="{{ request('rif_cab') }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
    </div>

@endsection
@section('tabla')
    <div class="max-w-4xl mx-auto mt-8 mb-6 bg-white shadow-lg rounded-lg p-8">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Agregar nueva categoría</h2>
        <form method="post" class="space-y-4" action="{{ route('admin.categories.store') }}">
            @csrf
            <div>
                <label for="nombre" class="block text-sm font-medium text-gray-700">Categoría:</label>
                <input type="text" id="nombre" name="nombre"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-400 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                    required>
            </div>
            <div>
                <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción:</label>
                <input type="text" id="descripcion" name="descripcion"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-400 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                    required>
            </div>
            <div class="flex justify-end">
                <input type="submit" value="Agregar Categoría"
                    class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors cursor-pointer">
            </div>
        </form>
        <script>
            document.getElementById('add-category-form').addEventListener('submit', function(e) {
                e.preventDefault(); // Evita el envío tradicional del formulario

                // 1. Obtén los valores de los campos
                const nombre = document.getElementById('nom_cat').value;
                const descripcion = document.getElementById('tip_cat').value;

                // 2. Prepara los datos para enviar
                const data = {
                    nom_cat: nombre,
                    tip_cat: descripcion
                };

                // 3. Realiza la petición AJAX usando fetch
                fetch("{{ route('admin.categories.store') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify(data)
                    })
                    .then(response => response.json()) // 4. Procesa la respuesta como JSON
                    .then(data => {
                        if (data.success) {
                            // 5. Si fue exitoso, puedes agregar la nueva fila a la tabla sin recargar
                            alert('Categoría agregada correctamente');
                            // Aquí puedes agregar dinámicamente la nueva fila a la tabla si lo deseas
                            // O limpiar el formulario:
                            document.getElementById('add-category-form').reset();
                        } else {
                            alert('Error al agregar la categoría');
                        }
                    })
                    .catch(() => alert('Error de red'));
            });
        </script>
    </div>

    <div class="max-w-4xl mx-auto mb-8">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Lista de categorías</h2>
        <div class="overflow-x-auto rounded-lg shadow">
            <table class="min-w-full bg-white divide-y divide-gray-200">
                <thead class="bg-blue-500">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Numero</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Nombre</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Descripcion
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">acciones
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($categorias as $cat)
                        <tr class="hover:bg-blue-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $cat->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                <input type="text" class="edit-name hidden" name="name" value="{{ $cat->name }}">
                                <p class="view-name">{{ $cat->name }}</p>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                <input type="text" class="edit-desc hidden" name="desc" value="{{ $cat->desc }}">
                                <p class="view-desc">{{ $cat->desc }}</p>
                            </td>
                            <td class="px-6 py-4 text-sm font-medium">
                                <button type="button"
                                    class="edit-btn text-blue-600 hover:text-blue-900 ml-2">Editar</button>
                                <input type="submit" class="save-btn hidden text-green-600 hover:text-green-900 ml-2"
                                    value="Guardar">
                                <button type="button"
                                    class="cancel-btn hidden text-gray-600 hover:text-gray-900 ml-2">Cancelar</button>
                                <a href="" class="text-red-600 hover:text-red-900 ml-2">Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        document.querySelectorAll('.edit-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const row = btn.closest('tr');
                row.querySelector('.view-name').classList.add('hidden');
                row.querySelector('.view-desc').classList.add('hidden');
                row.querySelector('.edit-name').classList.remove('hidden');
                row.querySelector('.edit-desc').classList.remove('hidden');
                row.querySelector('.save-btn').classList.remove('hidden');
                row.querySelector('.cancel-btn').classList.remove('hidden');
                btn.classList.add('hidden');
            });
        });

        document.querySelectorAll('.cancel-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const row = btn.closest('tr');
                row.querySelector('.view-name').classList.remove('hidden');
                row.querySelector('.view-desc').classList.remove('hidden');
                row.querySelector('.edit-name').classList.add('hidden');
                row.querySelector('.edit-desc').classList.add('hidden');
                row.querySelector('.save-btn').classList.add('hidden');
                row.querySelector('.cancel-btn').classList.add('hidden');
                row.querySelector('.edit-btn').classList.remove('hidden');
            });
        });

        document.querySelectorAll('.save-btn').forEach(btn => {
            btn.addEventListener('click', function(id) {
                const row = btn.closest('tr');
                const cat = row.querySelector('td').textContent.trim();
                const name = row.querySelector('.edit-name').value;
                const desc = row.querySelector('.edit-desc').value;

                fetch(`/admin/categories/${cat}/editar`, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            name: name,
                            desc: desc
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            row.querySelector('.view-name').textContent = name;
                            row.querySelector('.view-desc').textContent = desc;
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
