<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productoView()
    {
        return view('administrador.products.agregarProducto');
    }

    public function createProduct(Request $request)
    {

        $producto = new Product();
        $producto->code = request("codigo");
        $producto->name = request("nombre");
        $producto->desc = request("descripcion");
        $producto->pric = request("oferta");
        $producto->cat_id = request("categoria");
        $producto->stat = request("estado");
        $producto->save();
        return redirect()->route('admin.products.addImage', $producto->id)->with('message', 'Producto creado');
    }

    public function addImagenView($id)
    {
        $producto = Product::findOrFail($id);
        return view('administrador.products.agregarImagenes', compact('producto'));
    }

    public function addImagen(Request $request, $id)
    {
        $producto = Product::findOrFail($id);
        $nombre = $producto->code;

        for ($i = 1; $i <= 3; $i++) {
            $inputName = 'imagen' . $i;
            if ($request->hasFile($inputName)) {
                $file = $request->file($inputName);
                $fileName = $nombre . $i . '.' . $file->getClientOriginalExtension();
                $ruta = $file->storeAs('catalogo' ,  $fileName, 'public');

                $img = new Imagen();
                $img->producto_id = $producto->id;
                $img->ruta = $ruta;
                $img->save();
            }
        }

        return redirect()->route('admin.dashboard')->with('message', 'Imágenes agregadas');
    }
    public function filterCategory($categoria, Request $request)
    {
        $title = 'Area de cliente';
        $titlePage = 'Pageland - Area de cliente';
        $image = 'https://example.com/image.jpg';
        $descriptionMain = 'Esta es una descripción de muestra para el área de cliente.';

        $nameButton = 'Salir';
        $Link = route('client.logout');

        $allCat = Category::all();
        $products = Product::where('cat_id', $categoria)->paginate(20);
        return view('index', compact('products', 'allCat', 'title', 'titlePage', 'image', 'descriptionMain', 'nameButton', 'Link'));
    }
}
