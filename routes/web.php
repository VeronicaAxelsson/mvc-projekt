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
