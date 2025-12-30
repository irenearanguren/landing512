<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Imagen;

use Illuminate\Http\Request;

class UserController extends Controller
{
public function index()
    {
        $productos = Product::with('imagenes')->paginate(20);
        print($productos);
/*         $imagenes = Imagen::with('product')->get();
        if ($imagenes->isEmpty()) {
            $imagenes = collect(); // Crear una colección vacía si no hay imágenes 
        } */
     return view('administrador.dashboard', compact('productos'));
    }
}
