<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


#Rutas públicas
Route::get('/', function () {
    return redirect()->route('productos.catalogo');
});

Route::get('/catalogo', [App\Http\Controllers\ProductosController::class, 'catalogo'])->name('productos.catalogo');

Route::get('/dashboard', function () {
    return redirect()->route('productos.index');
})->middleware(['auth', 'verified'])->name('dashboard');

    // Rutas para el recurso 'productos'
    Route::get('/productos', [App\Http\Controllers\ProductosController::class, 'index'])->name('productos.index');

    // Ruta para mostrar el formulario de creación de un nuevo producto
    Route::get('/productos/create', [App\Http\Controllers\ProductosController::class, 'create'])->name('productos.create');

    // Ruta para almacenar un nuevo producto en la base de datos
    Route::post('/productos', [App\Http\Controllers\ProductosController::class, 'store'])->name('productos.store');

    // Ruta para mostrar el formulario de edición de un producto existente
    Route::get('/productos/{productos}/edit', [App\Http\Controllers\ProductosController::class, 'edit'])->name('productos.edit');

    // Ruta para actualizar un producto existente en la base de datos
    Route::put('/productos/{productos}', [App\Http\Controllers\ProductosController::class, 'update'])->name('productos.update');

    // Ruta para eliminar un producto existente de la base de datos
    Route::delete('/productos/{productos}', [App\Http\Controllers\ProductosController::class, 'destroy'])->name('productos.destroy');

    // Ruta para generar un reporte de productos en formato PDF
    Route::get('/productos/pdf', [App\Http\Controllers\ProductosController::class, 'pdf'])->name('productos.pdf');

    // Ruta para mostrar el catálogo de productos
    Route::get('/catalogo', [App\Http\Controllers\ProductosController::class, 'catalogo'])->name('productos.catalogo');

    // Ruta para contacto
    Route::get('/contacto', [App\Http\Controllers\ProductosController::class, 'contacto'])->name('productos.contacto');




/*
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
*/
