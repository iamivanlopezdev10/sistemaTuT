<?php

namespace App\Exports;

use App\Models\Producto;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductosExport implements FromCollection, WithHeadings
{
    protected $productos;

    public function __construct($productos)
    {
        $this->productos = $productos;
    }

    public function collection()
    {
        return $this->productos->map(function ($producto) {
            return [
                'ID' => $producto->id,
                'Clave' => $producto->clave,
                'Nombre' => $producto->nombre,
                'Descripción' => $producto->descripcion,
                'Cantidad' => $producto->cantidad,
                'Precio' => $producto->precio,
                'Piso' => $producto->piso,
                'Categoría' => $producto->categoria->nombre ?? 'Sin categoría',
                'Departamento' => $producto->departamento->ubicacion ?? 'Sin departamento',
                'Habilitado' => $producto->habilitado ? 'Sí' : 'No',
                'Creado' => $producto->created_at,
                'Actualizado' => $producto->updated_at,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'ID',
            'Clave',
            'Nombre',
            'Descripción',
            'Cantidad',
            'Precio',
            'Piso',
            'Categoría',
            'Departamento',
            'Habilitado',
            'Creado',
            'Actualizado',
        ];
    }
}
