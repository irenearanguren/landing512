<div class="p-6">
                                            <form id="editForm" method="POST"
                                                action="{{ route('products.update', $producto->id_pro) }}">
                                                @csrf
                                                @method('PUT')
                                                <input id="productId" name="id" readonly
                                                    value="{{ $producto->id_pro }}">

                                                <div class="mb-4">
                                                    <label for="productName"
                                                        class="block text-sm font-medium text-gray-700">Nombre</label>
                                                    <input type="text" id="productName" name="nombre"
                                                        value="{{ $producto->nom_cod }}"
                                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                </div>

                                                <div class="mb-4">
                                                    <label for="productPrice"
                                                        class="block text-sm font-medium text-gray-700">Precio</label>
                                                    <input type="number" id="productPrice" name="precio"
                                                        value="{{ $producto->pre_pro }}"
                                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                </div>

                                                <div class="mb-4">
                                                    <label for="productDescription"
                                                        class="block text-sm font-medium text-gray-700">Descripción</label>
                                                    <textarea id="productDescription" name="descripcion" value="{{ $producto->des_pro }}"
                                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    </textarea>
                                                </div>
                                                <div class="mb-4">
                                                    <label for="productEstatus"
                                                        class="block text-sm font-medium text-gray-700">Estatus</label>
                                                    <select id="productEstatus" name="Estatus"
                                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                        <option value="disponible">Disponible</option>
                                                        <option value="agotado">Agotado</option>
                                                        <option value="nuevo">Nuevo</option>
                                                    </select>
                                                </div>

                                                <div class="flex justify-end">
                                                    <button type="button" onclick="cerrarModal({{ $producto->id_pro }})"
                                                        class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 mr-2">Cancelar</button>
                                                    <button type="submit"
                                                        class="px-4 py-2 bg-indigo-500 text-white rounded-md hover:bg-indigo-600">Guardar</button>
                                                </div>
                                            </form>
                                        </div>
    <script>
        function abrirModalEditar(id) {
            const modal = document.getElementById('editarProductos-' + id);
            modal.classList.remove('hidden')
        }

        function cerrarModal(id) {
            const modal = document.getElementById('editarProductos-' + id);
            modal.classList.add('hidden')
        }
    </script>