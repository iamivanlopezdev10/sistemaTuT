@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border border-secondary">
                <div class="card-header text-center bg-primary text-white py-4">
                    <h3 class="mb-0">{{ __('Tecnológico Universitario Tuxtla') }}</h3>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h5 class="text-center font-weight-bold text-black mb-4">{{ __('¡Bienvenido al sistema de inventario!') }}</h5>
                    <p class="text-center">
                        Actualmente tienes <strong class="text-black">{{ $cantidadArticulos }}</strong> artículos en inventario
                    </p>

                    <div class="row mb-4">
                        <div class="col-md-8">
                            <div class="row">
                                @foreach ([ 
                                    ['title' => __('Total de Artículos'), 'value' => $cantidadArticulos, 'icon' => 'fas fa-box'],
                                    ['title' => __('Artículos Agregados Hoy'), 'value' => $articulosAgregadosHoy, 'icon' => 'fas fa-plus-circle'],
                                    ['title' => __('Artículos Críticos'), 'value' => $articulosCriticosCount, 'icon' => 'fas fa-exclamation-triangle']
                                ] as $stat)
                                    <div class="col-md-4">
                                        <div class="card text-center mb-3 border border-info">
                                            <div class="card-body bg-light">
                                                <h5 class="card-title">
                                                    <i class="{{ $stat['icon'] }}"></i> {{ $stat['title'] }}
                                                </h5>
                                                <p class="card-text">{{ $stat['value'] }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h6 class="text-center">{{ __('Distribución de Artículos por Categoría') }}</h6>
                            <canvas id="categoryChart" class="img-fluid" style="max-width: 100%; height: auto;"></canvas>
                        </div>
                    </div>

                    <!-- Gráfico -->
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script>
                        const ctx = document.getElementById('categoryChart').getContext('2d');
                        const categoryChart = new Chart(ctx, {
                            type: 'pie',
                            data: {
                                labels: {!! json_encode($nombresCategorias) !!},
                                datasets: [{
                                    label: 'Artículos por Categoría',
                                    data: {!! json_encode($cuentasCategorias) !!},
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.6)',
                                        'rgba(54, 162, 235, 0.6)',
                                        'rgba(255, 206, 86, 0.6)',
                                        'rgba(75, 192, 192, 0.6)',
                                        'rgba(153, 102, 255, 0.6)',
                                        'rgba(255, 159, 64, 0.6)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                responsive: true,
                                plugins: {
                                    legend: {
                                        position: 'top',
                                    },
                                    title: {
                                        display: true,
                                        text: 'Distribución de Artículos por Categoría',
                                        font: {
                                            size: 16,
                                            weight: 'bold'
                                        }
                                    }
                                }
                            }
                        });
                    </script>

                    <h2 class="font-weight-bold text-dark mb-4">{{ __('Acciones Rápidas') }}</h2>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('productos.index') }}" class="btn btn-primary mb-2 w-10"><i class="fas fa-eye"></i> {{ __('Ver Productos') }}</a></li>
                        <li><a href="{{ route('productos.create') }}" class="btn btn-primary mb-2 w-10"><i class="fas fa-plus"></i> {{ __('Agregar Productos') }}</a></li>
                        <li><a href="{{ route('productos.export') }}" class="btn btn-primary mb-2 w-10"><i class="fas fa-download"></i> {{ __('Descargar Productos') }}</a></li>
                        <li><a href="{{ route('productos.pdf') }}" class="btn btn-primary mb-2 w-10"><i class="fas fa-file-pdf"></i> {{ __('Descargar PDF') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
