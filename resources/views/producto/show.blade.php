@extends('layouts.app')

@section('template_title')
    {{ $producto->name ?? __('Show') . " " . __('Producto') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Producto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('productos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Clave:</strong>
                            {{ $producto->clave }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Nombre:</strong>
                            {{ $producto->nombre }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Descripcion:</strong>
                            {{ $producto->descripcion }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Cantidad:</strong>
                            {{ $producto->cantidad }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Precio:</strong>
                            {{ $producto->precio }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Piso:</strong>
                            {{ $producto->piso }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Categoria Id:</strong>
                            {{ $producto->categoria_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Departamento Id:</strong>
                            {{ $producto->departamento_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Habilitado:</strong>
                            {{ $producto->habilitado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
