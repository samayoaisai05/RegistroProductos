<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ProductosController extends Controller
{
    // creamos la funcion para catalogo
    public function catalogo(){
        $productos = Productos::all(); # Obtener todos los productos
        return view('productos.catalogo', compact('productos'));
    }

    // creamos la funcion para contacto
    public function contacto(){
        return view('productos.contacto');
    }

    // Controlador para generar reportes de productos en formato PDF
    public function pdf(){
        $productos = Productos::all(); # Obtener todos los productos
        $logo = base64_encode(file_get_contents(public_path('img/zonadigital.webp'))); # Ruta del logo para incluir en el PDF
        $totalProductos = $productos->count(); # Contar el total de productos

        $pdf = PDF::loadView('productos.pdf', compact('productos', 'logo', 'totalProductos'));
        return $pdf->stream('productos.pdf');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //pasamos los datos a la vista index
        $productos = Productos::all();
        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //vamos a retornar la vista create
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validamos los datos del formulario
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'nullable',
            'precio' => 'required|numeric',
            'imagen' => 'nullable|image'
        ]);

        // creamos un nuevo producto con los datos del formulario
        Productos::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'imagen' => $request->hasFile('imagen') ? $request->file('imagen')->store('imagenes', 'public') : null
        ]);
        return redirect()->route('productos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Productos $productos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Productos $productos)
    {
        // retornamos la vista edit con el producto a editar
        return view('productos.edit', compact('productos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Productos $productos)
    {
        // validamos los datos del formulario
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'nullable',
            'precio' => 'required|numeric',
            'imagen' => 'nullable|image'
        ]);

        // actualizamos el producto con los datos del formulario
        $productos->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'imagen' => $request->hasFile('imagen') ? $request->file('imagen')->store('imagenes', 'public') : $productos->imagen
        ]);
        return redirect()->route('productos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Productos $productos)
    {
        // eliminamos el producto
        $productos->delete();
        return redirect()->route('productos.index');
    }
}
