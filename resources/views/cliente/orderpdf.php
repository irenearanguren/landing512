<?php

use setasign\Fpdf\Fpdf;

public function imprimirOrdenPDF($orderId)
{
    $cabecera = Order::find($orderId);
    $items = OrderDetail::where('order_id', $orderId)->with('product')->get();

    $pdf = new Fpdf();
    $pdf->AddPage();

    // Logo (ajusta la ruta y tamaño)
    $pdf->Image(public_path('images/logo.png'), 10, 8, 30);

    // Título y fecha
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, 'Presupuesto de Orden', 0, 1, 'C');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 8, 'Fecha: ' . now()->format('d/m/Y'), 0, 1, 'R');
    $pdf->Ln(5);

    // Datos del cliente
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 8, 'Cliente: ' . $cabecera->client->name, 0, 1);
    $pdf->Cell(0, 8, 'Email: ' . $cabecera->client->email, 0, 1);
    $pdf->Cell(0, 8, 'Dirección: ' . $cabecera->address, 0, 1);
    $pdf->Ln(5);

    // Tabla de productos
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->SetFillColor(220, 220, 220);
    $pdf->Cell(70, 8, 'Producto', 1, 0, 'C', true);
    $pdf->Cell(30, 8, 'Cantidad', 1, 0, 'C', true);
    $pdf->Cell(40, 8, 'Precio', 1, 0, 'C', true);
    $pdf->Cell(40, 8, 'Total', 1, 1, 'C', true);

    $pdf->SetFont('Arial', '', 12);
    foreach ($items as $item) {
        $pdf->Cell(70, 8, $item->product->nom_cod, 1);
        $pdf->Cell(30, 8, $item->quantity, 1, 0, 'C');
        $pdf->Cell(40, 8, '$' . number_format($item->price, 2), 1, 0, 'R');
        $pdf->Cell(40, 8, '$' . number_format($item->quantity * $item->price, 2), 1, 1, 'R');
    }

    // Total
    $total = $items->sum(function($item) {
        return $item->quantity * $item->price;
    });
    $pdf->Ln(5);
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(0, 10, 'Total: $' . number_format($total, 2), 0, 1, 'R');

    // Descargar PDF
    $pdf->Output('I', 'orden_' . $cabecera->id . '.pdf');
    exit;
}
