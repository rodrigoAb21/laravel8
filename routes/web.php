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
    return view('home');
})->middleware('auth');

Route::get('/home', function () {
    return redirect('/');
})->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::middleware('administrador')->group(function () {
        Route::resource('trabajadores', 'TrabajadorController');
    });

    Route::get( '(.*)', function(){
        return redirect('/');
    });
});
