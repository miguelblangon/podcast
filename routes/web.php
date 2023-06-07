<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();
//Home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Usuarios
Route::get('/user-show/{user}', [App\Http\Controllers\HomeController::class, 'show'])->name('user.show');
Route::post('/user-update', [App\Http\Controllers\HomeController::class, 'update'])->name('user.update');
Route::post('/user-update-admin/{user}', [App\Http\Controllers\HomeController::class, 'updateAdmin'])->name('user.update.admin');
//Eliminar y Restaurar Usuarios 
Route::delete('/user-delete/{user}', [App\Http\Controllers\HomeController::class, 'delete'])->name('user.delete');
Route::post('/user-restore/{user}', [App\Http\Controllers\HomeController::class, 'restore'])->name('user.restore');

//Podcast
Route::group(['middleware' => ['auth']], function () { //Podcast
//Vista de crear
Route::get('/podcast-create', [App\Http\Controllers\PodcastController::class, 'create'])->name('podcast.create');
//funcion guardar
Route::post('/podcast-create', [App\Http\Controllers\PodcastController::class, 'store'])->name('podcast.store');
//funcion de descargar el audio
Route::get('/podcast-descargar/{podcast}', [App\Http\Controllers\PodcastController::class, 'descargar'])->name('podcast.descargar');
});