<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 *
 * @property $id
 * @property $clave
 * @property $nombre
 * @property $descripcion
 * @property $cantidad
 * @property $precio
 * @property $piso
 * @property $categoria_id
 * @property $departamento_id
 * @property $habilitado
 * @property $created_at
 * @property $updated_at
 *
 * @property Categoria $categoria
 * @property Departamento $departamento
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Producto extends Model
{
    

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['clave', 'nombre', 'descripcion', 'cantidad', 'precio', 'piso', 'categoria_id', 'departamento_id', 'habilitado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categoria()
    {
        return $this->belongsTo(\App\Models\Categoria::class, 'categoria_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function departamento()
    {
        return $this->belongsTo(\App\Models\Departamento::class, 'departamento_id', 'id');
    }
    

}
