<?php

use App\Models\Cliente;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClienteController;

//Route::get('/', 'Auth\LoginController@showLoginForm');
Route::get('/', function () {
    return view('auth.login');
    //return view('welcome');
});

//Auth::routes();
Auth::routes(['register' => false]);
/* Route::permanentRedirect('/register', '/login');
Route::permanentRedirect('/index', '/dash'); */

Route::get('dash/{path?}', [App\Http\Controllers\SpaController::class, 'index'])->where('path', '([A-z0-9-\/_.]+)?')->name('index');

/*Ruta para acceder a los metodos del controller de cada clase*/
Route::apiResource('/clientes',ClienteController::class);