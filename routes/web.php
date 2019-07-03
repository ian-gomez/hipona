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
Route::resource('/', 'HomeController');

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
	//Administrar jornadas
	Route::resource('jornadas', 'JornadasController');
	
	//Configuración de jornadas
    Route::get('configjornada/{id_jornada}', 'ConfigController@index');
    Route::post('configjornada/guardar', 'ConfigController@update');

    //Asistencias
    Route::get('asistencias/{id_jornada}/{dni}', 'AsistenciasController@index');

	Route::get('registro', 'PersonaController@selectcategoria');
	Route::get('home', 'PersonaController@agregar');
	Route::get('/home', 'ListadoController@index')->name('home');
	Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

	Route::get('pdfPersonas', 'PersonaController@pdfGenerate');
	Route::get('exportarPdf', 'PersonaController@exportar');
	Route::post('inserta', 'PersonaController@agregar');
	Route::resource('Listado', 'ListadoController');
});



