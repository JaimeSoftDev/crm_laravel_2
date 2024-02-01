<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GamesController;
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

Route::get('/games', [GamesController::class,'index'])->name('games');

Route::get('/games/create', [GamesController::class,'create'])->name('gamesCreate');

Route::get('/games/{name_game}/{categoria?}', [GamesController::class,'help']);
Route::get('/view/{game_id}/', [GamesController::class,'view'])->name('viewGame');

Route::post('/games/storeVideogame', [GamesController::class,'storeVideogame'])->name('createVideogame');
Route::post('/games/updateVideogame', [GamesController::class,'updateVideogame'])->name('updateVideogame');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
