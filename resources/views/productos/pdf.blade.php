<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte PDF</title>

    <style>

        body{
            font-family: DejaVu Sans;
        }

        .encabezado{
            text-align:center;
            margin-bottom:20px;
        }
        footer {
            position: fixed;
            bottom: 0px;
            left: 0px;
            right: 0px;
            text-align: center;
            font-size: 11px;
            color: #555;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        th, td{
            border:1px solid #000;
            padding:8px;
        }

        th{
            background:#eaeaea;
        }

    </style>

</head>
<body>

    <div class="encabezado">

        <img src="data:image/webp;base64,{{ $logo }}" width="200">

        <!-- Mi nombre y mi correo -->
        <p>
            <strong>Marvin Isaí Gómez Samayoa</strong><br>
            <strong>isai.gomez@zonadigital.com</strong>
        </p>

        <h2>Reporte de productos</h2>

        <p>
            Total de productos registrados:
            <strong>{{ $totalProductos }}</strong>
        </p>
    </div>

    <footer>
        ITCA - FEPADE Centro Santa Tecla | Teléfono 2222 - 2222
    </footer>

    <table>

        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Imagen</th>
            </tr>
        </thead>

        <tbody>

            @foreach($productos as $producto)

                <tr>
                    <td>{{ $producto->id }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->descripcion }}</td>
                    <td>${{ $producto->precio }}</td>
                    @php
                        $rutaImagen = storage_path('app/public/' . $producto->imagen);
                        $tipoImagen = pathinfo($rutaImagen, PATHINFO_EXTENSION);
                    @endphp

                    <td>
                        @if($producto->imagen && file_exists($rutaImagen))
                            <img src="data:image/{{ $tipoImagen }};base64,{{ base64_encode(file_get_contents($rutaImagen)) }}" width="60">
                        @else
                            Sin imagen
                        @endif
                    </td>
                </tr>

            @endforeach

        </tbody>

    </table>

</body>
</html>
