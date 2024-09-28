<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id(); // Identificador único
            $table->string('clave'); // Clave del producto
            $table->string('nombre'); // Nombre del producto
            $table->text('descripcion')->nullable(); // Descripción del producto (opcional)
            $table->integer('cantidad'); // Cantidad disponible
            $table->decimal('precio', 10, 2); // Precio del producto
            $table->string('piso')->nullable(); // Piso donde se encuentra (opcional)
            $table->foreignId('categoria_id')->constrained('categorias'); // Referencia a la categoría
            $table->foreignId('departamento_id')->constrained('departamento'); // Referencia al departamento
            $table->boolean('habilitado')->default(true); // Estado de habilitación
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
