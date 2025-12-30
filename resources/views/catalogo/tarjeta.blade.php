  
<div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
    <a href="#">
        @if ($product->imagenes->isEmpty())
            <img class="p-8 rounded-t-lg" src="{{ asset('images/no-image.png') }}" alt="No Image Available" />
        @else
            <img class="p-8 rounded-t-lg" src="{{asset('storage/'. $product->imagenes->first()->ruta)}}" alt="product image" />
        @endif
    </a>
    <div class="px-5 pb-5">
        <a href="#">
            <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{$product->name}}</h5>
        </a>
    </div>
        <div class="flex items-center justify-between">
            @auth
            <form action="{{route('addToOrder', $product->id)}}" method="GET">
                @csrf
                <span class="text-3xl font-bold text-gray-900 dark:text-white">${{$product->pric}}</span>
                <input type="hidden" name="id_pro" value="{{$product->id}}">
                <input type="submit" value="Agregar a la orden" name="addToOrder"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            </form>
            @endauth
    </div>
</div>
