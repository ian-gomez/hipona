<?php

Route::resource('/', 'HomeController');
Route::get('desarrolladores', 'HomeController@desarrolladores');
Route::get('personas/create', ['as' => 'personas.create', 'uses' => 'PersonaController@create']);
Route::post('personas', ['as' => 'personas.store', 'uses' => 'PersonaController@store']);

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
	
	//Administrar jornadas
	Route::resource('jornadas', 'JornadasController');
	Route::get('jornadas/buscar/{id_jornada}', 'JornadasController@buscar_nombre');
	
	//Configuración de jornadas
    Route::get('configjornada/{id_jornada}', 'ConfigController@index');
    Route::post('configjornada/guardar', 'ConfigController@update');
	
	Route::resource('personas', 'PersonaController', ['except' => ['create', 'store']]);
	//Asistencias
    Route::get('asistencias/{id_jornada}/{dni}', 'AsistenciasController@index');
    Route::get('asistencias/{id_jornada}', 'AsistenciasController@edit');
    Route::post('asistencias/cargar', 'AsistenciasController@store');

	Route::get('/home', 'ListadoController@index')->name('home');
	Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
	/*
	Route::get('registro', 'PersonaController@selectcategoria');
	Route::get('home', 'PersonaController@agregar');
	Route::get('pdfPersonas', 'PersonaController@pdfGenerate');
	Route::get('exportarPdf', 'PersonaController@exportar');
	Route::post('inserta', 'PersonaController@agregar');
	*/
	Route::resource('Listado', 'ListadoController');
});



