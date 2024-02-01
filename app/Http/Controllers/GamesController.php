<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Videogame;
use App\Models\Category;

class GamesController extends Controller
{
    public function index(){
        $videogames = Videogame::orderBy('id', 'desc')->get();
        return view('index', ['games'=>$videogames]);
    }
    public function create(){
        $categorias = Category::all();
        return view('create', ['categories'=>$categorias]);
    }

    public function help($name_game, $categoria=null){
        $date = Now();
        return view('show', ['nameVideogame'=>$name_game,
                            'categoryGame'=>$categoria,
                            'fecha'=>$date,]);
    }

    public function storeVideogame(Request $request){
        $game = new Videogame;
        $game->name=$request->name_game;
        $game->category_id=$request->category_id;
        $game->active=$request->active;
        $game->save();

        return redirect()->route('games');
    }

    public function view($game_id){
        $game = Videogame::find($game_id);

        $categorias = Category::all();
        return view('update', ['categories'=>$categorias, 'game'=>$game]);
    }

    public function updateVideogame(Request $request){
        $game = Videogame::find($request->game_id);
        $game->name=$request->game_name;
        $game->category_id=$request->category_id;
        $game->active=$request->active;
        $game->save();

        return redirect()->route('games');
    }
}
