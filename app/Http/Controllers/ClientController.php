<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Client;
use app\Models\User;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function indexOrder()
    {
        $buttonText= "Salir";
        $productos = Product::all();
        $client = Client::where('id_user', Auth::id())->first();
        if (!$client) {
            $client = new \stdClass();
            $client->rif = 'rif';
            $client->name = 'nombre';
            $client->direccion = 'direccion';
            $client->telefono = 'telefono';
            $client->email = 'email';
        }

        $carrito = session()->get('carrito', []);
        return view('cliente.carrito', compact('productos', 'carrito', 'client', 'buttonText'));
    }

}

