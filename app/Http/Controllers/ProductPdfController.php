<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Categoria;
use App\Models\Producto; // Asegúrate de tener el modelo correcto
use Illuminate\Http\Request;
use PDF; // Importa la clase PDF

class ProductPdfController extends Controller
{
    public function generarPdf()
    {
        // Obtén los productos con las relaciones necesarias
        $productos = Producto::with(['categoria', 'departamento'])->get();

        // Prepara los datos para la vista
        $data = [
            'productos' => $productos,
        ];

        // Genera el PDF
        $pdf = PDF::loadView('pdf.plantilla', $data);
        
        // Descarga el PDF
        return $pdf->download('productos.pdf');
    }
}
