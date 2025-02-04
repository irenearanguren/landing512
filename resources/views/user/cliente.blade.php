@extends('user/layout_product')
@section('title', 'Cliente')
@section('cabecera')
{{-- {{@auth
{{auth()->user()->name}}
@endauth}} --}}

<img src="" alt="">
<div class="max-w-6xl mx-auto p-10 bg-blue-300 rounded-sm text-center ">
    <h1>Cliente</h1>
</div>
@endsection

@section('catalogo')
    <div class="container max-w-6xl mx-auto p-10 bg-grey-100 ">
        <div class="flex justify-center mb-6 shadow-md p-4">
            <form action="">
                <input type="text">
                <button>buscar</button>
            </form>
        </div>
    </div>    

<div class="relative max-w-6xl overflow-x-auto shadow-md sm:rounded-lg mt-6 max-h-screen">
    <table class="min-w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Product name
                </th>
                <th scope="col" class="px-6 py-3">
                    Color
                </th>
                <th scope="col" class="px-6 py-3">
                    Category
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    
                </th>
                <td class="px-6 py-4">
                    
                </td>
                <td class="px-6 py-4">
                    
                </td>
                <td class="px-6 py-4">
                    
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Ver</a>
                </td>
            </tr>
            
    </table>
</div>

    </div>
@endsection

