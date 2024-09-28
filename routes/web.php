<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductPdfController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Ruta pública para la página de login
Route::get('/', function () {
    return view('auth.login'); // Especifica la carpeta 'auth' en la ruta de la vista
});

// Rutas de autenticación
Auth::routes();

// Rutas protegidas por autenticación
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('categorias', CategoriaController::class);
    Route::resource('productos', ProductoController::class);
    Route::resource('departamentos', DepartamentoController::class);
    // Ruta para exportar productos
    Route::get('export', [ProductoController::class, 'export'])->name('productos.export');
    Route::get('/home/pdf', [ProductPdfController::class, 'generarPdf'])->name('productos.pdf');
});