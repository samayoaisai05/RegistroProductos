<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Rutas para el recurso 'productos'
Route::get('/productos', [App\Http\Controllers\ProductosController::class, 'index'])->name('productos.index');

// Ruta para mostrar el formulario de creación de un nuevo producto
Route::get('/productos/create', [App\Http\Controllers\ProductosController::class, 'create'])->name('productos.create');

// Ruta para almacenar un nuevo producto en la base de datos
Route::post('/productos', [App\Http\Controllers\ProductosController::class, 'store'])->name('productos.store');
