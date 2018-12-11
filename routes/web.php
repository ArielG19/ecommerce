<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', 'MainController@home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('productos','ProductosController');
Route::get('listar-productos','ProductosController@listarProductos');

//contralor para agregar productos al carrito
Route::resource('in-shopping-cart','InShoppingCartController');
Route::get('mostrar-productos','InShoppingCartController@mostrar');
