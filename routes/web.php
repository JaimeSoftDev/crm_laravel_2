<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return "Bienvenido al inicio function";
});
//Ruta que nos lleva a la lista de juegos
Route::get('/games', [GamesController::class,'index'])->name('games');

//Ruta que nos lleva a la creación de un juego
Route::get('/games/create', [GamesController::class,'create'])->name('gamesCreate');

//Ruta que nos lleva a la sección de información de un juego
Route::get('/games/{name_game}/{categoria?}', [GamesController::class,'help']);

//Ruta que nos lleva a la edición de un juego
Route::get('/view/{game_id}/', [GamesController::class,'view'])->name('viewGame');

//Ruta que guarda un juego en la BD
Route::post('/games/storeVideogame', [GamesController::class,'storeVideogame'])->name('createVideogame');

//Ruta que actualiza un juego en la BD
Route::post('/games/updateVideogame', [GamesController::class,'updateVideogame'])->name('updateVideogame');

//Ruta que elimina un juego de la BD
Route::get('/delete/{game_id}/', [GamesController::class,'delete'])->name('deleteGame');

Route::resource('categories', CategoryController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
