<div class="row padding-1 p-1">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="clave" class="form-label">{{ __('Clave') }}</label>
                            <input type="text" name="clave" class="form-control @error('clave') is-invalid @enderror" value="{{ old('clave', $producto?->clave) }}" id="clave" placeholder="Clave">
                            {!! $errors->first('clave', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
                            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $producto?->nombre) }}" id="nombre" placeholder="Nombre">
                            {!! $errors->first('nombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="descripcion" class="form-label">{{ __('Descripción') }}</label>
                            <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" value="{{ old('descripcion', $producto?->descripcion) }}" id="descripcion" placeholder="Descripción">
                            {!! $errors->first('descripcion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="cantidad" class="form-label">{{ __('Cantidad') }}</label>
                            <input type="text" name="cantidad" class="form-control @error('cantidad') is-invalid @enderror" value="{{ old('cantidad', $producto?->cantidad) }}" id="cantidad" placeholder="Cantidad">
                            {!! $errors->first('cantidad', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="precio" class="form-label">{{ __('Precio') }}</label>
                            <input type="text" name="precio" class="form-control @error('precio') is-invalid @enderror" value="{{ old('precio', $producto?->precio) }}" id="precio" placeholder="Precio">
                            {!! $errors->first('precio', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="piso" class="form-label">{{ __('Piso') }}</label>
                            <input type="text" name="piso" class="form-control @error('piso') is-invalid @enderror" value="{{ old('piso', $producto?->piso) }}" id="piso" placeholder="Piso">
                            {!! $errors->first('piso', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="categoria_id" class="form-label">{{ __('Categoría') }}</label>
                            <select name="categoria_id" class="form-control @error('categoria_id') is-invalid @enderror" id="categoria_id">
                                <option value="">{{ __('Seleccionar Categoría') }}</option>
                                @if(isset($categorias) && $categorias->count())
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id }}" {{ old('categoria_id', $producto?->categoria_id) == $categoria->id ? 'selected' : '' }}>
                                            {{ $categoria->nombre }}
                                        </option>
                                    @endforeach
                                @else
                                    <option disabled>No hay categorías disponibles.</option>
                                @endif
                            </select>
                            {!! $errors->first('categoria_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="departamento_id" class="form-label">{{ __('Departamento') }}</label>
                            <select name="departamento_id" class="form-control @error('departamento_id') is-invalid @enderror" id="departamento_id">
                                <option value="">{{ __('Seleccionar Departamento') }}</option>
                                @if(isset($departamentos) && $departamentos->count())
                                    @foreach ($departamentos as $departamento)
                                        <option value="{{ $departamento->id }}" {{ old('departamento_id', $producto?->departamento_id) == $departamento->id ? 'selected' : '' }}>
                                            {{ $departamento->ubicacion }}
                                        </option>
                                    @endforeach
                                @else
                                    <option disabled>No hay departamentos disponibles.</option>
                                @endif
                            </select>
                            {!! $errors->first('departamento_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="habilitado" class="form-label">{{ __('Habilitado') }}</label>
                            <div>
                                <input type="checkbox" name="habilitado" value="1" id="habilitado" {{ old('habilitado', $producto?->habilitado) ? 'checked' : '' }}>
                                <label for="habilitado">{{ __('Sí') }}</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mt-2">
                    <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>
