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
Route::get('/', function () {
  return view('welcome');
});
*/



Route::get('/', "DashPersonasController@index")->name('personas');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/rest_depatamentos', "DepartamentosController");
Route::resource('/rest_municipios', "MunicipiosController");
Route::resource('/rest_paices', "PaicesController");
Route::resource('/rest_personas', "PersonasController");
Route::resource('/rest_emails', "EmailsController");

Route::get('logout', function(){
    Auth::logout();
    return redirect()->route('login');
});