<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;


Route::get('/', function () {
    return view('index');
});
Route::get('/login',[LoginController::class,'login'])->name('login');
Route::get('/register',[RegisterController::class,'register'])->name('register');

Route::post('/clientlogin',[LoginController::class,'clientLogin'])->name('clientlogin');
Route::post('/clientregister',[RegisterController::class,'clientRegister'])->name('clientregister');

Route::middleware(['auth'])->group(function(){
    Route::get('/adaministrador/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
     // Rutas para categorías
     Route::post('/admin/categories', [CategoryController::class, 'store'])->name('categories.store');
     Route::post('/admin/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
     Route::post('/admin/categories/{id}/delete', [CategoryController::class, 'destroy'])->name('categories.destroy');
 
     // Rutas para productos
     Route::post('/admin/products/nuevo', [ProductController::class, 'producto_nuevo'])->name('products.producto_nuevo');
     Route::post('/admin/products/{id}', [ProductController::class, 'update'])->name('products.update');
     Route::post('/admin/products/{id}/delete', [ProductController::class, 'destroy'])->name('products.destroy');

     // Rutas para usuarios
     Route::get('/cliente/dashboard',[ClienteController::class,'cliente'])->name('user.cliente');
     Route::get('/cliente/perfil',[ClienteController::class,'perfil'])->name('user.perfil');
     Route::get('/cliente/contacto',[ClienteController::class,'contacto'])->name('user.contacto');
     Route::post('/cliente/editarPerfil',[ClienteController::class,'editarPerfil'])->name('user.editarPerfil');
     Route::post('/cliente/enviarcomentario',[ClienteController::class,'enviarComentario'])->name('user.enviarcomentario');

     Route::get('/cliente/logout',[LoginController::class,'logout'])->name('user.logout');

    });
Route::middleware(['products'])->group(function(){
    Route::get('/invitado/dashboard',[ClienteController::class,'invitado'])->name('user.invitado');
});
