@extends('layout.app')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Lista de Productos</h2>

        <!-- Botón para crear un nuevo producto que te redirige a la vista de producto.create-->
        <a href="{{ route('productos.create') }}" class="btn btn-primary mb-3">Crear Producto</a>

        <a href="{{ route('productos.pdf') }}" class="btn btn-secondary mb-3" target="_blank">Generar PDF</a>

        <!-- Tabla para mostrar los productos -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Mostrar cada producto en una fila de la tabla -->
                <!-- Recorremos el array de productos que pasamos desde el controlador -->
                @foreach($productos as $producto)
                <tr>
                    <td>{{ $producto->id }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->descripcion }}</td>
                    <td>{{ $producto->precio }}</td>
                    <td>
                        @if($producto->imagen)
                            <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="img-thumbnail" style="max-width: 100px;">
                        @endif
                    </td>
                    <td>
                        <!-- Botón para editar el producto -->
                        <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-sm btn-warning">Editar</a>

                        <!-- Formulario para eliminar el producto -->
                        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?')">Eliminar</button>
                        </form>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
