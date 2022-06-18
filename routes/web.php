<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


require __DIR__.'/auth.php';


Route::middleware(['auth'])->group(function() {
    


    Route::get('/game', [Controllers\GameController::class, 'create'])->name('game.create');
    Route::post('/game', [Controllers\GameController::class, 'store']);

    Route::get('/game/{game}/edit', [Controllers\GameController::class, 'edit'])->name('game.edit');
    Route::post('/game/{game}/edit', [Controllers\GameController::class, 'update']);
    
    Route::get('/user', [Controllers\Auth\RegisteredUserController::class, 'edit'])->name('auth.edit');
    Route::post('/user', [Controllers\Auth\RegisteredUserController::class, 'update']);

    Route::get('/city', [Controllers\CityController::class, 'create'])->name('city.create');
    Route::post('/city', [Controllers\CityController::class, 'store']);
    
    Route::get('/country', [Controllers\CountryController::class, 'create'])->name('country.create');
    Route::post('/country', [Controllers\CountryController::class, 'store']);
    
    Route::get('/league', [Controllers\LeagueController::class, 'create'])->name('league.create');
    Route::post('/league', [Controllers\LeagueController::class, 'store']);
    
    Route::get('/team', [Controllers\TeamController::class, 'create'])->name('team.create');
    Route::post('/team', [Controllers\TeamController::class, 'store']);
    
    Route::get('/teamslist', [Controllers\TeamController::class, 'list'])->name('team.list');    
    Route::get('/teamslist/{team}', [Controllers\TeamController::class, 'destroy'])->name('team.delete');
    
    Route::post('/{game}', [Controllers\HomeController::class, 'predict']);
    
});


Route::get('/', [Controllers\HomeController::class, 'index'])->name('home');
Route::get('/{league}', [Controllers\HomeController::class, 'index'])->name('list');
Route::get('/game/{game}', [Controllers\GameController::class, 'show'])->name('game.details');