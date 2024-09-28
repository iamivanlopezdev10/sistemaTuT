<!DOCTYPE html>
<html>
<head>
    <title>Productos PDF</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px; /* Espacio entre tablas */
        }
        th, td {
            border: 1px solid #ddd;
            padding: 4px; /* Espaciado dentro de las celdas */
            text-align: center; /* Centrar texto */
        }
        th { 
            background-color: #f2f2f2; 
        }
        h1 {
            font-size: 20px; 
            margin: 0 0 10px 0; 
        }
        .producto {
            width: 30%; /* Ancho de cada producto */
            display: inline-block; /* Para mostrar en línea */
            margin: 0 1.5%; /* Espacio entre productos */
            vertical-align: top; /* Alinear al top */
        }
    </style>
</head>
<body>
    <h1>Lista de Productos</h1>
    <div class="productos-container">
        @foreach ($productos as $producto)
            <div class="producto">
                <table>
                    <thead>
                        <tr>
                            <th>Producto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $producto->categoria->nombre }} - {{ $producto->clave }} - {{ $producto->departamento->ubicacion }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            @if (($loop->iteration % 3) == 0) <!-- Salto de línea después de cada 3 productos -->
                <div style="page-break-after: avoid;"></div>
            @endif
        @endforeach
    </div>
</body>
</html>
