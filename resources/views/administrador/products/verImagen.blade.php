<script>
// Abre el modal de imágenes del producto
function abrirModalImagenes(id) {
    // Busca el modal por su id y le quita la clase 'hidden' para mostrarlo
    document.getElementById('modal-imagenes-' + id).classList.remove('hidden');
}

// Cierra el modal de imágenes del producto
function cerrarModalImagenes(id) {
    // Busca el modal por su id y le agrega la clase 'hidden' para ocultarlo
    document.getElementById('modal-imagenes-' + id).classList.add('hidden');
}

// Muestra el formulario para editar una imagen específica
function mostrarInputEditar(imgId) {
    // Busca el formulario de edición por su id y lo muestra
    document.getElementById('form-editar-' + imgId).classList.remove('hidden');
}

// Oculta el formulario para editar una imagen específica
function ocultarInputEditar(imgId) {
    // Busca el formulario de edición por su id y lo oculta
    document.getElementById('form-editar-' + imgId).classList.add('hidden');
}
</script>

    <div id="modal-imagenes-{{ $producto->id }}" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex justify-center items-center">
    <div class="bg-white p-6 rounded shadow-lg w-full max-w-lg">
        <h2 class="text-xl font-bold mb-4">Imágenes del producto</h2>
        <div class="flex flex-wrap gap-4 mb-4">
            @foreach($producto->imagenes ?? [] as $img)
                <div class="flex flex-col items-center">
                    <img src="{{ asset('storage/' . $img->ruta) }}" alt="Imagen" class="w-32 h-32 object-cover rounded mb-2">
                    <!-- Botón para editar (puedes abrir otro modal o mostrar input para reemplazar) -->
                    <button onclick="mostrarInputEditar({{ $img->id }})" class="text-blue-600 text-xs">Editar</button>
                    {{-- <form id="form-editar-{{ $img->id }}" class="hidden mt-2" method="POST" action="{{ route('admin.imagenes.update', $img->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="file" name="nueva_imagen" accept="image/*" class="mb-2">
                        <button type="submit" class="bg-green-500 text-white px-2 py-1 rounded text-xs">Guardar</button>
                        <button type="button" onclick="ocultarInputEditar({{ $img->id }})" class="bg-gray-400 text-white px-2 py-1 rounded text-xs">Cancelar</button>
                    </form> --}}
                </div>
            @endforeach
        </div>
        <div class="flex justify-end">
            <button onclick="cerrarModalImagenes({{ $producto->id }})" class="bg-blue-500 text-white px-4 py-2 rounded">Cerrar</button>
        </div>
    </div>
</div>
