<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Formulario de edición de juegos</h1>
    <p><a href="{{route('games')}}">Lista de juegos</a></p>
    <form action="{{route('updateVideogame')}}" method="POST">
        @csrf
        <input type="hidden" name="game_id" value="{{$game->id}}">
        @error('name')
        {{$message}} <br>
        @enderror
        <input type="text" name="name" placeholder="Nombre del videojuego" value="{{$game->name}}">
        <select name="category_id">
            @foreach($categories as $category)
            <option value="{{$category->id}}" @if($category->id==$game->category_id) selected @endif>{{$category->name}}</option>
            @endforeach
        </select>
        <select name="active">
           
            <option @if($game->active==1) selected @endif value="1">Activo</option>
            <option @if($game->active==0) selected @endif value="0">Inactivo</option>
            
        </select>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>