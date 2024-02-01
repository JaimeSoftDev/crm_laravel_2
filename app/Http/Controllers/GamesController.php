<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GamesController extends Controller
{
    public function index(){
        $videogames = ['Fifa 22', 'Dark Souls', 'Super Mario', 'Mario Kart'];
        return view('index', ['games'=>$videogames]);
    }
    public function create(){
        // return "Esta es la página donde se creará el formularion de dar de alta a juegos";
        return view('create');
    }

    public function help($name_game, $categoria=null){
        $date = Now();
        return view('show', ['nameVideogame'=>$name_game,
                            'categoryGame'=>$categoria,
                            'fecha'=>$date,]);
    }
}
