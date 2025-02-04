@extends('layout')
@section('cabecera')
<div class="container">
    <div>
        <h3 class="text-2xl font-bold">
            Nombre de la empresa
        </h3>
        <br>
    </div>
    <div>
    </div>
</div>
@endsection
@section('catalogo')
<div class="sm:flex sm:justify-center">
    <div class="flex flex-col shadow-secondary-1 dark:bg-surface-dark sm:shrink-0 sm:grow sm:basis-0 sm:rounded-e none">
        <a href="#">
            <img src="" alt="imagen" class="rounded-t-lg sm:rounded-tr-none"> 
        </a>
        <div class="p-4">
            <h5 class="mb-2 text-xl font-bold leading-tight">
                titulo de tarjeta
            </h5>
            <p class="mb-4">descripcion de la tarjeta</p>
        </div>
    </div>
    <div class="flex flex-col shadow-secondary-1 dark:bg-surface-dark sm:shrink-0 sm:grow sm:basis-0 sm:rounded-e none">
        <a href="#">
            <img src="" alt="imagen" class="rounded-t-lg sm:rounded-tr-none"> 
        </a>
        <div class="p-4">
            <h5 class="mb-2 text-xl font-bold leading-tight">
                titulo de tarjeta
            </h5>
            <p class="mb-4">descripcion de la tarjeta</p>
        </div>
    </div>
    <div class="flex flex-col shadow-secondary-1 dark:bg-surface-dark sm:shrink-0 sm:grow sm:basis-0 sm:rounded-e none">
        <a href="#">
            <img src="" alt="imagen" class="rounded-t-lg sm:rounded-tr-none"> 
        </a>
        <div class="p-4">
            <h5 class="mb-2 text-xl font-bold leading-tight">
                titulo de tarjeta
            </h5>
            <p class="mb-4">descripcion de la tarjeta</p>
        </div>
    </div>
</div>
    
@endsection