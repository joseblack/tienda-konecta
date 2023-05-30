<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController,
    App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProducController;
use App\Http\Controllers\VentaController;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {

// Rutas de usuarios sistema
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

// Rutas de clientes
Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create');
Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');
Route::get('/clientes/{cliente}/edit', [ClienteController::class, 'edit'])->name('clientes.edit');
Route::put('/clientes{cliente}', [ClienteController::class, 'update'])->name('clientes.update');
Route::get('/clientes/{cliente}', [ClienteController::class, 'show'])->name('clientes.show');
Route::delete('/clientes/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');

// rutas productos
Route::get('/productos', [ProducController::class, 'index'])->name('productos.index');
Route::get('/productos/create', [ProducController::class, 'create'])->name('productos.create');
Route::post('/productos', [ProducController::class, 'store'])->name('productos.store');
Route::get('/productos/{producto}/edit', [ProducController::class, 'edit'])->name('productos.edit');
Route::put('/productos{producto}', [ProducController::class, 'update'])->name('productos.update');
Route::get('/productos/{producto}', [ProducController::class, 'show'])->name('productos.show');
Route::delete('/productos/{producto}', [ProducController::class, 'destroy'])->name('productos.destroy');

// rutas ventas realizadas
Route::get('/ventas', [VentaController::class, 'index'])->name('ventas.index');
Route::post('/ventas', [VentaController::class, 'store'])->name('ventas.store');

});