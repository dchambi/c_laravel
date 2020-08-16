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
});
// ruta saludo
Route::get('/hola/rutas', function () {
    return 'hola desde web.php';
});
//agrupando rutas
Route::group(['prefix'=>'saludo'],function(){
    Route::get('/dia', function () {
        return 'Buenos dias';
    });
    Route::get('/tarde', function () {
        return 'Buenas tarde';
    });
    Route::get('/noche', function () {
        return 'Buenas noche';
    });
});
// ruta controlador
Route::get('/prueba', 'PruebaController@index');

// paso de parametros
Route::get('/prueba/parametros/{nombre}/{edad} ', 'PruebaController@parametrosAction');

// RENDERIZAR VISTA DESDE CONTROLADOR
Route::get('/prueba/vista', 'PruebaController@vistaAction');

// ENVIAR DATOS DEL CONTROLADOR HACIA LA VISTA
Route::get('/prueba/datos/{nombre}/{edad} ', 'PruebaController@datosAction');

//COMPONENETES BLADE
Route::get('/prueba/blade', 'PruebaController@bladeAction');

//Modulo de Usuario

Route::group(['prefix'=>'admin'],function(){
    Route::get('/home','admin\HomeController@index')->name('admin_home');
    
    //Modulo de usuarios (adicionar, editar, eliminar)
    Route::resource('user','admin\UserController');
    
     

    });