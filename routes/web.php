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


Route::get('/home', function () {
    return redirect('/');
});

Route::get('/visualizar/{item}', [App\Http\Controllers\HomeController::class, 'show']);

Route::post('/pesquisa', [\App\Http\Controllers\AdminController::class, 'search']);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin',  [\App\Http\Controllers\AdminController::class, 'index']);
    Route::get('/admin/adicionar', [\App\Http\Controllers\AdminController::class, 'create']);
    Route::get('/admin/edit/{item}',  [\App\Http\Controllers\AdminController::class, 'edit']);
    Route::post('/admin/{item}',   [\App\Http\Controllers\AdminController::class, 'update']);
    Route::post('/admin', [\App\Http\Controllers\AdminController::class, 'store']);
    Route::delete('/admin/{item}', [\App\Http\Controllers\AdminController::class, 'delete']);

    Route::get('/usuarios', [UsuariosController::class, 'index']);
    Route::get('/usuarios/adicionar', [UsuariosController::class, 'create']);
    Route::post('/usuarios/salvar', [UsuariosController::class, 'store']);
    Route::delete('/usuarios/{user}', [UsuariosController::class, 'delete']);
});

