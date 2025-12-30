@extends('layout')
@section('titlePage', 'Carrito')
@section('title', 'Carrito')
@section('descriptionMain', 'Carrito de orden de compra')
@section('buttonText', $buttonText)

@section('section1')

@if (session('message'))
    <div class="alert" role="alert">
        {{session('message')}}
    </div>
@endif
@if (session('error'))
    <div class="alert" role="alert">
        {{session('error')}}
    </div>
@endif
@if (session('success'))
    <div class="alert" role="alert">
        {{session('success')}}
    </div>
@endif
<div class="container max-w-6xl mx-auto p-10 bg-grey-100">

    <h2 class="text-xl font-bold mb-4">Carrito</h2>
    

    <h2 class="text-xl font-bold mb-4">Generar Presupuesto</h2>
    <form action="{{ route('save.order') }}" method="POST">
        @csrf
        <input type="text" name="rif_cab" value="{{$client->rif}}" required class="text-md mb-4 italic text-gray-500 solid border-b-2 border-gray-300 focus:outline-none focus:border-blue-500">
        <input type="text" name="nom_cab" value="{{$client->name}}" required class="text-md mb-4 italic text-gray-500 solid border-b-2 border-gray-300 focus:outline-none focus:border-blue-500">
        <input type="text" name="dir_cab" value="{{$client->direccion}}" class="text-md mb-4 italic text-gray-500 solid border-b-2 border-gray-300 focus:outline-none focus:border-blue-500">
        <input type="text" name="tel_cab" value="{{$client->telefono}}" class="text-md mb-4 italic text-gray-500 solid border-b-2 border-gray-300 focus:outline-none focus:border-blue-500">
        <input type="email" name="mal_cab" value="{{$client->email}}" required class="text-md mb-4 italic text-gray-500 solid border-b-2 border-gray-300 focus:outline-none focus:border-blue-500">
        
        <div class="overflow-x-auto relative mt-4">
        <table>
                @foreach($carrito as $item)
                <thead>
                    <th class="hidden"><span>id</span></th>
                    <th>Cantidad</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Subtotal</th>
                </thead>
                <tbody>
                    <td class="hidden">{{ $item['id_pro'] }}</td>
                    <td>
                        <input type="number" name="cantidad" id="cantidad" value="1" class="cantidad">
                    </td>
                    <td>{{ $item['nombre'] }}</td>
                    <td>${{ $item['precio'] }}</td>
                    <td class="total" id="total-{{$loop->index}}"></td>
                </tbody>

             @endforeach
            </table>
        </div>
        <div id="total" class="mt-4 text-right font-bold"> <span>Total: </span></div>
          <button type="submit" class=" text-center bg-blue-600 text-white p-2 rounded-md hover:bg-blue-700">Generar PDF</button>  
        
    </form>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const cantidades = document.querySelectorAll('.cantidad');
        const totalElement = document.getElementById('total');

        function calcularTotal() {
            let total = 0;

            cantidades.forEach((input, index) => {
                const precio = parseFloat(input.closest('tr').querySelector('td:nth-child(3)').textContent.replace('$', ''));
                const cantidad = parseInt(input.value) || 0; 
                const subtotal = precio * cantidad;

                const subtotalElement = document.getElementById(`total-${index}`);
                if (subtotalElement) {
                    subtotalElement.textContent = subtotal.toFixed(2);
                }

                total += subtotal;
            });

            totalElement.innerHTML = `<strong>Total: $${total.toFixed(2)}</strong>`;
        }

        cantidades.forEach(input => {
            input.addEventListener('input', calcularTotal);
        });

        calcularTotal();
    });
</script>
</div>

@endsection