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
//ruta raiz
Route::get('/', function () {
    return view('welcome');
})->name('main');

// ruta saludo
Route::get('/hola/rutas', function () {
    return 'hola desde web.php';
})->name('practica 1');
//agrupando rutas
Route::group(['prefix'=>'saludo'],function(){
    Route::get('/dia', function () {
        return 'Buenos dias';
    })->name('practica2');
    Route::get('/tarde', function () {
        return 'Buenas tarde';
    })->name('practica3');
    Route::get('/noche', function () {
        return 'Buenas noche';
    })->name('practica4');
});
// ruta controlador
Route::get('/prueba', 'PruebaController@index')->name('practica5');

// paso de parametros
Route::get('/prueba/parametros/{nombre}/{edad}', 'PruebaController@parametrosAction')->name('practica6');

// RENDERIZAR VISTA DESDE CONTROLADOR
Route::get('/prueba/vista', 'PruebaController@vistaAction')->name('practica7');

// ENVIAR DATOS DEL CONTROLADOR HACIA LA VISTA
Route::get('/prueba/datos/{nombre}/{edad} ', 'PruebaController@datosAction')->name('practica8');

//COMPONENETES BLADE
Route::get('/prueba/blade', 'PruebaController@bladeAction')->name('practica9');

//Modulo de Usuario

//Ruta Sistema Administrativo
Route::group(['prefix'=>'admin'],function(){
    Route::get('/home','admin\HomeController@index')->name('admin_home');
    
    //Modulo de usuarios (adicionar, editar, eliminar)
    Route::resource('user','admin\UserController');
});