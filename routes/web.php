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
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/visualizar/{item}', [App\Http\Controllers\HomeController::class, 'show']);
Route::post('/pesquisa', [\App\Http\Controllers\AdminController::class, 'search']);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin',  [\App\Http\Controllers\AdminController::class, 'index']);
    Route::get('/admin/adicionar', [\App\Http\Controllers\AdminController::class, 'create']);
    Route::get('/admin/edit/{item}',  [\App\Http\Controllers\AdminController::class, 'edit']);
    Route::post('/admin/{item}',   [\App\Http\Controllers\AdminController::class, 'update']);
    Route::post('/admin', [\App\Http\Controllers\AdminController::class, 'store'])->name('admin.create');
    Route::delete('/admin/{item}', [\App\Http\Controllers\AdminController::class, 'delete'])->name('registro.delete');

    Route::get('/usuarios', [\App\Http\Controllers\UsersController::class, 'index']);
    Route::get('/usuarios/adicionar', [\App\Http\Controllers\UsersController::class, 'create']);
    Route::post('/usuarios/salvar', [\App\Http\Controllers\UsersController::class, 'store'])->name('usuarios.salvar');
    Route::delete('/usuarios/{user}', [\App\Http\Controllers\UsersController::class, 'delete'])->name('usuarios.delete');
});

