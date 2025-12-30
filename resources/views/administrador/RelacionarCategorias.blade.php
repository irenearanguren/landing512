</td>
        <!-- asignar categorias -->
        <td class="px-4 py-2">
            <div class="justify-center ">
                <form method="POST" action="{{ route('products.asignarCategorias', $producto->id_pro) }}">
                    @csrf
                    <label for="categorias" class="block text-sm font-medium text-gray-700">Categorías:</label>
                    <select name="categorias[]" id="categorias" multiple
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id_cat }}">{{ $categoria->nom_cat }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md text-sm">Asignar
                        Categorías</button>
                </form>
            </div>
            <div>
                @if (session('success'))
                    <div class="fixed top-0 right-0 p-4 bg-gray-800 text-white rounded-md" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </td>