@extends('layout.app')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Crear Producto</h2>

        <!-- Formulario para crear un nuevo producto -->
        <!-- el action hace que se envíe el formulario a la ruta productos.store -->
        <form action="{{ route('productos.store') }}" method="POST" class="card p-4 mb-4" enctype="multipart/form-data">

            @csrf <!-- Token de seguridad para evitar ataques CSRF -->


            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del producto</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" step="0.01" class="form-control" id="precio" name="precio" required>
            </div>

            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
            </div>

            <button type="submit" class="btn btn-primary">Guardar Producto</button>
            <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
