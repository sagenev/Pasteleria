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

// Route::get('/', function () {
//     return view('carrito');
// });

Route::get('/','CarroController@formCarro')->name('formCarro');
Route::post('/agregarCarro','CarroController@agregarAlCarro')->name('agregarCarro');
Route::post('/borrarDelCarro','CarroController@borrarDelCarro')->name('borrarArticulo');
