<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AdventureController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. Thes
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [IndexController::class, 'index']);

Route::prefix('adventure')->group(function () {
    Route::get('/', [AdventureController::class, 'index'])->name('adventure');
    Route::get('/quest', [AdventureController::class, 'quest'])->name('quest');
    Route::post('/room', [AdventureController::class, 'nextRoom'])->name('room');
    Route::post('/roll', [AdventureController::class, 'playAgainstLion']);
});
// Route::get('adventure', [AdventureController::class, 'index']);
// Route::get('adventure/quest', [AdventureController::class, 'quest']);
// Route::post('adventure/room', [AdventureController::class, 'nextRoom']);
// Route::post('adventure/roll', [AdventureController::class, 'roll']);
//
// Route::prefix('yatzy')->group(function () {
//     Route::get('/', [YatzyController::class, 'index'])->name('yatzy');
//     Route::post('/throw', [YatzyController::class, 'throw']);
//     Route::post('/newgame', [YatzyController::class, 'newGame']);
//     Route::post('/newround', [YatzyController::class, 'newRound']);
// });
//
// Route::prefix('game21')-> group(function () {
//     Route::get('/', [Game21Controller::class, 'index'])->name('game21');
//     Route::post('/roll', [Game21Controller::class, 'roll']);
//     Route::post('/end', [Game21Controller::class, 'end']);
//     Route::post('/reset', [Game21Controller::class, 'reset']);
//     Route::post('/newround', [Game21Controller::class, 'newRound']);
// });
//
// Route::get('/book', [BookController::class, 'index']);
// // Route::get('/book/add', [BookController::class, 'addBook']);
// // Route::get('/book/delete', [BookController::class, 'deleteBook']);
// // Route::get('/book/all', [BookController::class, 'allBooks']);
//
// Route::get('/highscore', [HighScoreController::class, 'index']);
