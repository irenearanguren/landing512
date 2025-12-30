@extends('administrador.layoutadmin')

@section('cabecera')
    <div class="max-w-6xl mx-auto p-10 bg-blue-300 rounded-sm text-center">
        <h1>Reportes de Presupuestos</h1>
    </div>
    <div class="flex flex-col items-center bg-gray-200 p-4">
        <h2 class="text-xl font-bold mb-4">Buscar Presupuestos</h2>

        <!-- Formulario de búsqueda -->
        <form method="GET" action="" class="flex flex-col md:flex-row gap-4 mb-6">
            <div>
                <label for="rif_cab" class="block text-sm font-medium text-gray-700">RIF</label>
                <input type="text" id="rif_cab" name="rif_cab" value="RIF del cliente"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            {{-- <div>
                <label for="fecha_inicio" class="block text-sm font-medium text-gray-700">Fecha Inicio</label>
                <input type="date" id="fecha_inicio" name="fecha_inicio" value="{{ request('fecha_inicio') }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <div>
                <label for="fecha_fin" class="block text-sm font-medium text-gray-700">Fecha Fin</label>
                <input type="date" id="fecha_fin" name="fecha_fin" value="{{ request('fecha_fin') }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div> --}}

            <div class="flex items-end">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Buscar</button>
            </div>
        </form>
    @endsection

    @section('tabla')
        <div class="flex h-screen bg-gray-200 p-4 justify-center">
            <div>
                <h2 class="text-xl font-bold mb-4">Lista de Presupuestos</h2>
                <table class="min-w-full bg-white w-3/4">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Número</th>
                            <th class="px-4 py-2">Fecha</th>
                            <th class="px-4 py-2">Cliente</th>
                            <th class="px-4 py-2">Total</th>
                            <th class="px-4 py-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($presupuestos as $presupuesto)
                            <tr>
                                <td class="border px-4 py-2">{{ $presupuesto->num_cab }}</td>
                                <td class="border px-4 py-2">{{ $presupuesto->fec_cab }}</td>
                                <td class="border px-4 py-2">{{ $presupuesto->nom_cab }}</td>
                                <td class="border px-4 py-2">
                                    {{-- ${{ $presupuesto->detalles->sum('tot_det') }} --}}
                                </td>
                                <td class="border px-4 py-2">
                                    <button onclick="abrirModal({{ $presupuesto->num_cab }})"
                                        class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                                        Ver Detalles
                                    </button>
                                
                                     <!-- Modal para Detalles -->
                                    <div id="detalleModal-{{ $presupuesto->num_cab }}"
                                        class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50 hidden">
                                        <div class="bg-white rounded-lg shadow-lg w-1/2">
                                            <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                                                <h2 class="text-lg font-semibold">Detalles del Presupuesto</h2>
                                                <button onclick="cerrarModal({{ $presupuesto->num_cab }})"
                                                    class="text-gray-500 hover:text-gray-700">&times;</button>
                                            </div>
                                            <div class="p-6">
                                                <table class="min-w-full bg-white">
                                                    <thead>
                                                        <tr>
                                                            <th class="px-4 py-2">Producto</th>
                                                            <th class="px-4 py-2">Cantidad</th>
                                                            <th class="px-4 py-2">Precio</th>
                                                            <th class="px-4 py-2">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody >
                                                        @foreach ($presupuesto->orderDetails as $det)
                                                            <tr>
                                                                <td class="border px-4 py-2">{{ $det->product_id }}</td>
                                                                <td class="border px-4 py-2">{{ $det->quantity }}</td>
                                                                <td class="border px-4 py-2">{{ $det->price }}</td>
                                                                <td class="border px-4 py-2">{{ $det->quantity * $det->price }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>

                                            </div>
                                            {{-- <div>
                                                <form action="{{route('admin.presupuestopdf', $presupuesto->num_cab )}}">
                                                    @csrf
                                                    <input class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600" type="submit" value="Descargar PDF">
                                                </form>
                                            </div> --}}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                    <div class="flex justify-center mt-4">
                        {{ $presupuestos->onEachSide(1)->links('pagination::tailwind') }}
                    </div> 
            </div>
        </div>




        <script>
            function abrirModal(id) {
                const modal = document.getElementById('detalleModal-' + id);
                modal.classList.remove('hidden');


            }

            function cerrarModal(id) {
                const modal = document.getElementById('detalleModal-' + id);
                modal.classList.add('hidden');
            }
        </script>
    @endsection
