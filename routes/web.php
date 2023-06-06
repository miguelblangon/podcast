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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user-show/{user}', [App\Http\Controllers\HomeController::class, 'show'])->name('user.show');
Route::post('/user-update', [App\Http\Controllers\HomeController::class, 'update'])->name('user.update');
Route::post('/user-update-admin/{user}', [App\Http\Controllers\HomeController::class, 'updateAdmin'])->name('user.update.admin');
//Eliminar
Route::delete('/user-delete/{user}', [App\Http\Controllers\HomeController::class, 'delete'])->name('user.delete');
//Restaurar
Route::post('/user-restore/{user}', [App\Http\Controllers\HomeController::class, 'restore'])->name('user.restore');
