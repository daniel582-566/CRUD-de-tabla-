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

//var_dump(object), dump(object) convierte al objeto en un array para analizar.
//var_dump($loop). loop muestra toda la informacion de las intereaciones de los ciclos.(ultimo,primero....)
//var_dump($request): informacion de la pagina actual, peticion.
//dump(request()->path()): me trae la ruta actual.

//Pasos para agregar archivo php con helpers:
//agregar en composer.json dentro de autoload:
//"files":["app/helpers.php"]
Route::view('/Boot4/Practica-boot4','/Boot4/Practica-boot4')->name('boot4');

Route::view('/','home')->name('home');
Route::view('/quienes-somos','about')->name('about');
Route::view('/contacto','contact')->name('contact');

Route::resource('/projects','ProjectController'); //nombre predetermiado projects.index.
Route::resource('/users','userController');
Route::resource('/roles','rolController');

Route::post('contact', 'MessageController@store')->name('messege.store');

Auth::routes(['register'=>true]); //vender/laravel/framework/src/illuminate/routing/Router.php  line 1147
