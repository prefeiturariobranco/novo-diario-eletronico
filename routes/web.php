<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
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

Route::view('/teste', 'send_email');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/visualizar/{item}', [HomeController::class, 'show']);
Route::post('/pesquisa', [AdminController::class, 'search']);

Route::group(['middleware' => ['auth']], function () {
    Route::resource('admin', AdminController::class);
    Route::get('/usuarios', [UsersController::class, 'index']);
    Route::get('/usuarios/adicionar', [UsersController::class, 'create']);
    Route::post('/usuarios/salvar', [UsersController::class, 'store'])->name('usuarios.salvar');
    Route::delete('/usuarios/{user}', [UsersController::class, 'delete'])->name('usuarios.delete');
    Route::get('/usuarios/editar/{user}', [UsersController::class, 'edit'])->name('usuarios.editar');
    Route::post('/usuarios/alterar/{user}', [UsersController::class, 'update'])->name('usuarios.alterar');
});



