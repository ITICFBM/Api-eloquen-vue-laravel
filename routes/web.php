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

//Ruta de Welcome
Route::get('/',function(){
    return view('welcome');
});


Route::group(['middleware' => 'cors'], function () {

Route::get('/', 'PageController@index');


Auth::routes();
//Ruta De Home esta ruta estra protegida por auth
Route::get('/Materias', 'Backend\HomeController@index')->name('home');

//Ruta De MATERIAS esta ruta estra protegida por auth
//Route::get('/materias', 'Backend\MateriasController@index')->name('materias');

});


