<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use App\Models\Categoria; 
use App\Models\Departamento; 
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductosExport;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Total de artículos
        $cantidadArticulos = Producto::count();

        // Artículos agregados hoy
        $articulosAgregadosHoy = Producto::whereDate('created_at', today())->count();

        // Artículos críticos
        $articulosCriticosCount = Producto::where('cantidad', '<=', 0)->count();

        // Obtener categorías y contar artículos por categoría
        $categorias = Categoria::withCount('productos')->get();
        $nombresCategorias = $categorias->pluck('nombre');
        $cuentasCategorias = $categorias->pluck('productos_count');

        // Obtener productos para mostrar
        $productos = Producto::with(['categoria'])->get();

        return view('home', compact(
            'cantidadArticulos',
            'articulosAgregadosHoy',
            'articulosCriticosCount',
            'nombresCategorias',
            'cuentasCategorias',
            
        ));
    }
}

