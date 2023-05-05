<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegistroController;
use App\Http\Controllers\SesionController;
use App\Http\Controllers\SecureurlController;
use App\Http\Controllers\CerrarSesionController;
use App\Http\Controllers\imgController;
use App\Http\Controllers\ComentarioController;
use App\Models\User;
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

Route::get('/layout', function () {
    return view('layoutprincipal');
});

Route::get('/registro', [RegistroController::class, 'index'])->name('registro');
Route::post('/registro', [RegistroController::class, 'store']);

Route::get('/sesion', [SesionController::class, 'index'])->name('sesion');
Route::post('/sesion', [SesionController::class, 'store']);

Route::get('/{user:username}', [SecureurlController::class, 'index'])->name('accesoseguro');

Route::post('/logout', [CerrarSesionController::class, 'store'])->name('logout');

Route::get('/publicaciones/create', [SecureurlController::class, 'create'])->name('publicaciones.create');
Route::post('publicaciones', [SecureurlController::class, 'store'])->name('publicaciones.store');

Route::post('/imgs', [imgController::class, 'store'])->name('imagenes.store');

//Respetar el Routing model cuando se redirecciona
Route::get('/posts/{user:username}/{post}', [SecureurlController::class, 'show'])->name('publicaciones.show');

//Route::get('/comments/create', [ComentarioController::class, 'create'])->name('comments.create');
Route::post('/posts/{user:username}/{post}', [ComentarioController::class, 'store'])->name('comments.store');

Route::delete('/comentarios/{comentario}', [ComentarioController::class, 'destroy'])->name('comments.destroy');
