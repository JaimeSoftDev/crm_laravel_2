<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Formulario de creación de juegos</h1>
    <p><a href="{{route('games')}}">Lista de juegos</a></p>
    <form action="{{route('createVideogame')}}" method="POST">
        @csrf
        <input type="text" name="name_game" placeholder="Nombre del videojuego">
        <select name="category_id">
            @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        <select name="active">
           
            <option value="1">Activo</option>
            <option value="0">Inactivo</option>
            
        </select>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>