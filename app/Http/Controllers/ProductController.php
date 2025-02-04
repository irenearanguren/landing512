<?php

namespace App\Http\Controllers;
use App\Models\Productos;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(){
        $producto = new Productos();
        $producto->cod_pro = request('cod_pro');
        $producto->nom_cod = request('nom_cod');
        $producto->est_pro = request('est_pro');
        $producto->pre_pro = request('pre_pro');
        $producto->img_pro = request('img_pro');
        $producto->pes_pro = request('pes_pro');
        $producto->save();
        return redirect()->route('admin.dashboard');
    }

    public function update($cod_pro){
        $producto = Productos::find($cod_pro);
        $producto->nom_cod = request('nom_cod');
        $producto->est_pro = request('est_pro');
        $producto->pre_pro = request('pre_pro');
        $producto->img_pro = request('img_pro');
        $producto->pes_pro = request('pes_pro');
        $producto->save();
        return redirect()->route('admin.dashboard');
    }

    public function destroy($cod_pro){
        $producto = Productos::find($cod_pro);
        $producto->delete();
        return redirect()->route('admin.dashboard');
    }
}
