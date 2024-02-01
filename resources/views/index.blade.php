<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Vista creada desde el controlados usando la vista index</h1>
    <p><a href="{{route('gamesCreate')}}">Nuevo videojuego</a></p>
    <h2>Listado de juegos</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>ID CATEGORÍA</th>
                <th>CREADO</th>
                <th>ESTADO</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($games as $game)
                <tr>
                <th>{{$game->id}}</th>
                <th><a style="text-decoration:none; color:black" href="{{route('viewGame', $game->id)}}">{{$game->name}}</a></th>
                <th>{{$game->category_id}}</th>
                <th>{{$game->created_at}}</th>
                <th>@if($game->active)
                    <span style="color:green">Activo</span>
                    @else
                    <span style="color:red">Inativo</span>
                    @endif
                </th>
                <th><a href="{{route('deleteGame', $game->id)}}">Eliminar</a></th>
            </tr>
            @empty
            <tr>
                <th>Sin videojuegos</th>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>