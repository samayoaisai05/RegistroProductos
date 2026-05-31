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
        <h2 class="mb-4">Editar Producto</h2>

        <!-- Formulario para editar un producto existente -->
        <!-- el action hace que se envíe el formulario a la ruta productos.update con el id del producto a editar -->
        <form action="{{ route('productos.update', $productos->id) }}" method="POST" class="card p-4 mb-4" enctype="multipart/form-data">

            @csrf <!-- Token de seguridad para evitar ataques CSRF -->
            @method('PUT') <!-- Método HTTP para actualizar el recurso -->

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del producto</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $productos->nombre }}" required>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required>{{ $productos->descripcion }}</textarea>
            </div>

            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" step="0.01" class="form-control" id="precio" name="precio" value="{{ $productos->precio }}" required>
            </div>

            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                @if($productos->imagen)
                    <img src="{{ asset('storage/' . $productos->imagen) }}" alt="{{ $productos->nombre }}" class="img-thumbnail mb-2" style="max-width: 100px;">
                @endif
                <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Producto</button>
            <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
