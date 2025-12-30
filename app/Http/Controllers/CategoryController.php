<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // Logic to retrieve and display categories
        $categorias = Category::paginate(15);
        return view('administrador.categorias.categorias', compact('categorias'));
    }

public function update(Request $request, $id)
{
    $cat = Category::findOrFail($id);
    $cat->name = $request->name;
    $cat->desc = $request->desc;
    $cat->save();

    return response()->json(['success' => true]);
}

public function store(Request $request){
        $categoria = new Category();
        $categoria->name = $request->nombre;
        $categoria->desc = $request->descripcion;
        $categoria->save();
        return redirect()->route('admin.dashboard')->with('message', 'Categoría agregada exitosamente');
    }

    public function destroy($cat_id){
        $categoria = Category::find($cat_id);
        $categoria->delete();
        return redirect()->route('admin.dashboard')->with('message', 'Categoría eliminada exitosamente');
    }

}
