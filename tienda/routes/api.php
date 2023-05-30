<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\UserController;
use App\Http\Controllers\Api\PersonController;
use App\Http\Controllers\Api\AdminController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('register', 'App\Http\Controllers\UserController@register');
Route::post('login', 'App\Http\Controllers\UserController@authenticate');


Route::group(['middleware' => ['jwt.verify']], function() {

    Route::get('user', 'App\Http\Controllers\UserController@getAuthenticatedUser');
    Route::get('task', 'App\Http\Controllers\UserController@getTask');
    Route::post('task/save', 'App\Http\Controllers\UserController@saveTask');

    //Rutas de clientes
    Route::get('/clientes', [PersonController::class, 'index'])->name('clientes.index');
    Route::post('/clientes', [PersonController::class, 'store'])->name('clientes.store');
    Route::get('/clientes/{cliente}/edit', [PersonController::class, 'edit'])->name('clientes.edit');
    Route::put('/clientes{cliente}', [PersonController::class, 'update'])->name('clientes.update');
    Route::delete('/clientes/{cliente}', [PersonController::class, 'destroy'])->name('clientes.destroy');

    //Rutas de usuarios sistema
    Route::get('/users', [AdminController::class, 'index'])->name('users.index');
    Route::post('/users', [AdminController::class, 'store'])->name('users.store');
});