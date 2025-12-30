<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function presupuestoTable(Request $request)
    {
        $query = Order::query()->orderBy('id', 'desc');

        if ($request->filled('cliente_id')) {
            $query->where('cliente_id', 'like', '%' . $request->rif_cab . '%');
        }

/*         if ($request->filled('created_at') && $request->filled('updated_at')) {
            $query->whereBetween('fec_cab', [$request->created_at, $request->updated_at]);
        } */

        $presupuestos = $query->with(['orderDetails'])->paginate(10);

        return view('administrador.ordenes.ordenes', compact('presupuestos'));
    }

    /* public function presupuestopdf(Request $request, $id)
    {
        $presupuestos = or::where('id_cabecera', $id)->with(['detalle.producto'])->first();

        if (!$presupuestos) {
            return redirect()->route('admin.reportesPresupuestos')->with('error', 'Presupuesto no encontrado.');
        }

        $pdf = Pdf::loadView('admin.pdfPresupuestos', compact('presupuestos'));
        return $pdf->download('presupuestos'.$presupuestos->id_cabecera.'.pdf');
    } */

}
