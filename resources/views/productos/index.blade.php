<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
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
</body>
</html>
