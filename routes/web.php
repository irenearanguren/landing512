<?php


use App\Http\Controllers\ClientController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\indexController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CategoryController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

Route::get('/', [indexController::class, 'landingIrene'])->name('IreneAranguren');

Route::get('/demo/catalogo', [indexController::class, 'demo'])->name('demoindex');

Route::get('/admin', [UserController::class, 'index'])->name('login');

Route::post('client/register',[indexController::class, 'registerClient'])->name('client.registerNewClient');

Route::post('client/login',[indexController::class, 'login'])->name('client.login');

Route::get('client/logout',[indexController::class, 'logout'])->name('client.logout');

Route::middleware(['auth', 'client'])->group(function () {
    Route::get('/client',[indexController::class, 'client'])->name('index.client');
    Route::get('/catalogo/{id}', [ProductController::class, 'filterCategory'])->name('catalogo.category');

    Route::get('/carrito', [ClientController::class, 'indexOrder'])->name('user.order');
    Route::post('/carrito/agregar/{id_pro}', [OrderController::class, 'agregarProducto'])->name('addToOrder');

    Route::post('/carrito/generar', [OrderController::class, 'generarPresupuesto'])->name('save.order');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [UserController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/usuarios', [UserController::class, 'index'])->name('admin.users');
    Route::post('/admin/usuarios/crear', [UserController::class, 'store'])->name('admin.users.store');

    Route::get('/admin/productos/nuevo', [ProductController::class, 'productoView'])->name('admin.products');
    Route::post('/admin/productos/crear', [ProductController::class, 'createProduct'])->name('admin.products.create');
    Route::get('/admin/productos/imagenes/{id}', [ProductController::class, 'addImagenView'])->name('admin.products.Image');
    Route::post('/admin/productos/imagenes/{id}', [ProductController::class, 'addImagen'])->name('admin.products.addImage');


    Route::put('/admin/productos/{id}/editar', [ProductController::class, 'update'])->name('admin.products.update');
    Route::post('/admin/productos/imagenes/{id}/editar', [ProductController::class, 'updateImagen'])->name('admin.products.updateImage');
    Route::delete('/admin/productos/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');

    Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories');
    //Route::get('/admin/categories/nuevo', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/admin/categories/crear', [CategoryController::class, 'store'])->name('admin.categories.store');
    //Route::get('/admin/categories/{id}/editar', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/admin/categories/{id}/editar', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/admin/categories/delete/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');

    Route::get('/admin/pedidos', [OrderController::class, 'presupuestoTable'])->name('admin.orders');
});

