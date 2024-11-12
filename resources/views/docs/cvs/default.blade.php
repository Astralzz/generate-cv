<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Estilos --}}
    <link rel="stylesheet" href="css/default.css">

    <title>CV de {{ $name }}</title>
</head>

<body>
    <h1>Curriculum Vitae de {{ $name }}</h1>
    <h2>Habilidades</h2>
    <ul>
        @foreach ($skills as $skill)
            <li>{{ $skill }}</li>
        @endforeach
    </ul>

    <h2>Experiencia</h2>
    <ul>
        @foreach ($experience as $exp)
            <li>{{ $exp }}</li>
        @endforeach
    </ul>

    <h2>Educación</h2>
    <p>{{ $education }}</p>
</body>

</html>
