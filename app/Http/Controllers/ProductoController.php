<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria; 
use App\Models\Departamento; 
use App\Http\Requests\ProductoRequest;
use App\Exports\ProductosExport; 
use Maatwebsite\Excel\Facades\Excel; 
use Barryvdh\Snappy\Facades\SnappyPDF as PDF;
use App\Exports\ProductExportPdf;



/**
 * Class ProductoController
 * @package App\Http\Controllers
 */
class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::paginate();

        return view('producto.index', compact('productos'))
            ->with('i', (request()->input('page', 1) - 1) * $productos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener todas las categorías y departamentos
        $categorias = Categoria::all();
        $departamentos = Departamento::all();
        $producto = new Producto();
        
        // Enviar las variables a la vista
        return view('producto.create', compact('producto', 'categorias', 'departamentos'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductoRequest $request)
    {   
        
        Producto::create($request->validated());

        return redirect()->route('productos.index')
            ->with('success', 'Producto creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $producto = Producto::with(['categoria', 'departamento'])->findOrFail($id);
        $categorias = Categoria::all();
        $departamentos = Departamento::all();
        
        return view('producto.show', compact('producto', 'categorias', 'departamentos'));
    }
    
    
    /**
     * Show the form for editing the specified resource.
     */

     public function edit($id)
     {
         // Obtener el producto con sus relaciones
         $producto = Producto::with(['categoria', 'departamento'])->findOrFail($id);
         $categorias = Categoria::all();
         $departamentos = Departamento::all();
     
         // Enviar las variables a la vista
         return view('producto.edit', compact('producto', 'categorias', 'departamentos'));
     }
     


    /**
     * Update the specified resource in storage.
     */
    public function update(ProductoRequest $request, Producto $producto)
    {
        // Obtener los datos validados del request
        $data = $request->validated();
    
        // Verificar si el checkbox 'habilitado' está presente y asignar el valor correspondiente
        $data['habilitado'] = $request->has('habilitado') ? 1 : 0; // 1 si está marcado, 0 si no
    
        // Actualizar el producto con todos los datos
        $producto->update($data);
    
        // Redirigir con un mensaje de éxito
        return redirect()->route('productos.index')
            ->with('success', 'Producto actualizado exitosamente.');
    }
    
    

    public function destroy($id)
    {
        Producto::find($id)->delete();

        return redirect()->route('productos.index')
            ->with('success', 'Producto eliminado exitosamente.');
    }

    public function export()
    {
        // Obtener los productos con sus relaciones
        $productos = Producto::with(['categoria', 'departamento'])->get();
        
        return Excel::download(new ProductosExport($productos), 'productos.xlsx');
    }
             

}
