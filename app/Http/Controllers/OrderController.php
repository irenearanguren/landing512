<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\ClientAddress;

class OrderController extends Controller
{
    public function agregarProducto(Request $request, $id_pro)
    {
        
        $carrito = session()->get('carrito', []);
        $prod = Product::find($id_pro);

        $carrito[$id_pro] = [
            'id_pro' => $prod->id,
            'cantidad' => 1,
            'nombre' => $prod->name,
            'precio' => $prod->pric,
        ];

        session()->put('carrito', $carrito);
        return redirect()->route('user.order')->with('success', 'Producto agregado al carrito.');
    }

    public function generarPresupuesto(Request $request)
    {

        // Obtener el carrito de la sesión
        $carrito = session()->get('carrito', []);

        // Verificar si el carrito está vacío
        if (empty($carrito)) {
            return redirect()->route('user.order')->with('message', 'El carrito está vacío. No se puede generar un presupuesto.');
        }

        try {
            if (!$request->has('client_id'))
            {
                $client = new Client();
                $client->name = request("name");
                $client->email = request("email");
                $client->phone = request("phone");

                if (request("adress")) {
                    $addAddress = new clientAddress();
                    $addAddress->client_id = $client->id;
                    $addAddress->address = request("adress");
                    $addAddress->city = request("city");
                    $addAddress->state = request("state");
                    $addAddress->zip = request("zip");
                    $addAddress->save();
                }
            }
            // Crear la cabecera del presupuesto
            $cabecera = new Order();
            
            $cabecera->created_at = now();
            $cabecera->client_id = request("client_id");
            $cabecera->user_id = request("user_id");
            $cabecera->adress = request("adress");
            $cabecera->status = "En espera";
            $cabecera->save();



            foreach ($carrito as $producto) {

                $detalle = new OrderDetail();
                $detalle->order_id = $cabecera->id;
                $detalle->product_id = $producto['id_pro'];
                $detalle->quantity = $request->cantidad;
                $detalle->price = $producto['precio'];
                $detalle->created_at = now();
                $detalle->save();
            }


            // Limpiar el carrito después de generar el presupuesto
            session()->forget('carrito');

            return redirect()->route('user.presupuesto.pdf')->with('success', 'Presupuesto generado exitosamente.');
        } catch (\Exception $e) {
            // Manejo de errores
            return redirect()->route('user.order')->with('error', $e->getMessage());
        }
    }

/*     public function presupuestoPDFcliente()
    {
        $carrito = session()->get('carrito', []);
        $cabecera = Order::where('rif', Auth::user()->rif)->latest()->first();
        $items = OrderDetail::where('order_id', $cabecera->id)->with('product')->get();
        $pdf = Pdf::loadView('user.cliente.carrito.PresupuestoCliente', compact('cabecera', 'items'));
        return $pdf->download('cotizacion');
    }

    public function presupuestoVer()
    {
        $rif = Auth::user()->rif;

        $cabecera = Order::where('rif_cab', $rif)->latest()->first();

        /* if (!$cabecera) {
            return redirect()->route('user.cliente')->with('message', 'No se encontró ningún presupuesto.');
        } 

        $items = OrderDetail::where('order_id', $cabecera->id)->with('product')->get();


        return view('user.cliente.carrito.presupuestoCliente', compact('cabecera', 'items'));
    } */
}
