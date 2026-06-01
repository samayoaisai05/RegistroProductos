@extends('layout.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Catálogo de productos</h2>
    </div>

    <div class="row">
        @foreach($productos as $producto)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow">

                    @if($producto->imagen)
                        <img
                            src="{{ asset('storage/' . $producto->imagen) }}"
                            class="card-img-top"
                            style="height:250px; object-fit:cover;"
                        >
                    @else
                        <img
                            src="https://via.placeholder.com/300x250"
                            class="card-img-top"
                        >
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">
                            {{ $producto->nombre }}
                        </h5>

                        <p class="card-text">
                            {{ $producto->descripcion }}
                        </p>

                        <h4 class="text-success">
                            ${{ number_format($producto->precio, 2) }}
                        </h4>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
