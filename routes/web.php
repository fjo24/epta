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
//     return view('home');
// });
Route::group(['middleware' => 'idioma'], function() {
	

	Route::resource('/','PaginasController');
	Route::get('empresa',[
		'uses' => 'PaginasController@empresa',
		'as' => 'empresa'
	]);
	Route::get('descarga',[
		'uses' => 'PaginasController@descarga',
		'as' => 'descarga'
	]);
	Route::get('familia/{id}',[
		'uses' => 'PaginasController@producto',
		'as' => 'producto'
	]);
	Route::get('familia/{id}/producto',[
		'uses'=>'PaginasController@subproducto',
		'as'=>'subproducto'
	]);
	Route::get('familia/producto/{id}/galeria',[
		'uses'=>'PaginasController@subgaleria',
		'as'=>'subgaleria'
	]);
	Route::get('calidad',[
		'uses' => 'PaginasController@calidad',
		'as' => 'calidad'
	]);
	Route::get('descargas',[
		'uses' => 'PaginasController@descargas',
		'as' => 'descargas'
	]);
	Route::get('contacto',[
		'uses' => 'PaginasController@contacto',
		'as' => 'contacto'
	]);

	Route::get('presupuesto',[
		'uses' => 'PaginasController@presupuesto',
		'as' => 'presupuesto'
	]);
	Route::post('enviar_presupuesto',[
		'uses'=>'PaginasController@enviar_presupuesto',
		'as'=>'enviar_presupuesto'
	]);
	// Route::get('buscador',[
	// 	'uses'=>'PaginasController@buscador',
	// 	'as'=>'buscador'
	// ]);
	Route::post('productos/buscar',[
		'uses'=>'PaginasController@buscar',
		'as'=>'buscar'
	]);
	Route::post('enviar-mail',[
		'uses'=>'PaginasController@mail',
		'as'=>'mail'
	]);
	Route::get('idioma/{idioma}', 'IdiomaController@cambiarIdioma');
});
Route::group(['prefix' => 'adm'], function(){
	/*-----------------------login administrador----------------------------*/

    Route::post('usuario/authentificate', [
		'uses' => 'UsuarioController@authentificate',
		'as'   => 'usuario.authentificate'
	]);
	Route::get('/', [
		'uses' => 'UsuarioController@login',
		'as'   => 'usuario.login'
	]);
	Route::get('logout', [
		'uses' => 'UsuarioController@logout',
		'as'   => 'usuario.logout'
	]);
});

Route::group(['prefix' => 'adm'], function(){

    /*------------usuario----------------*/
    Route::resource('usuario', 'UsuarioController');
    Route::get('usuario/{id}/destroy',[
			'uses'=>'UsuarioController@destroy',
			'as'=>'usuario.destroy'
	]);
	/*----------slider-----------*/
	
    Route::get('sliders/create-producto',[
				'uses'=>'SliderController@create_producto',
				'as'=>'sliders.create_producto'
    ]);
    Route::get('sliders/producto',[
				'uses'=>'SliderController@index_producto',
				'as'=>'sliders.index_producto'
    ]);
    Route::get('sliders/{id}/destroy',[
			'uses'=>'SliderController@destroy',
			'as'=>'sliders.destroy'
	]);
	Route::resource('sliders','SliderController');

    /*-------redes -------------*/
	// Route::resource('redes','RedController');
	// Route::get('redes/{id}/destroy',[
	// 			'uses'=>'RedController@destroy',
	// 			'as'=>'redes.destroy'
	// 	]);
	// Route::post('redes/update-redes',[
	// 			'uses'=>'RedController@update_redes',
	// 			'as'=>'redes.update_redes'
 //    ]);
    
    /*----------productos-----------*/
	Route::resource('productos-destacados','ProductosController');

    /*----------Contenido-----------*/
	Route::resource('contenido','ContenidoController');

    /*-------logos -------------*/
    Route::resource('logos','LogoController');
    /*----------productos generales-----------*/
    Route::get('productos/{id}/destroy',[
			'uses'=>'ProductosGeneralesController@destroy',
			'as'=>'productos.destroy'
	]);
	Route::resource('productos','ProductosGeneralesController');
	/*----------subproductos-----------*/
    Route::get('subproductos/{id}/destroy',[
			'uses'=>'SubproductoController@destroy',
			'as'=>'subproductos.destroy'
	]);
	Route::resource('subproductos','SubproductoController');
	/*----------General-----------*/
	Route::get('general/{id}/create/general',[
			'uses'=>'GeneralController@create_general',
			'as'=>'general.create_general'
	]);
	Route::get('general/{id}/index/general',[
			'uses'=>'GeneralController@index_general',
			'as'=>'general.index_general'
	]);
    Route::get('general/{id}/destroy',[
			'uses'=>'GeneralController@destroy',
			'as'=>'general.destroy'
	]);
	Route::resource('general','GeneralController');
	  /*----------galeria de subproductos -----------*/
	Route::get('galeria/{id}/create',[
			'uses'=>'ImagenesController@create_galeria',
			'as'=>'galeria.create_galeria'
	]);
    Route::get('galeria/{id}/index',[
			'uses'=>'ImagenesController@index_galeria',
			'as'=>'galeria.index_galeria'
	]);
	Route::get('galeria/{id}/destroy',[
			'uses'=>'ImagenesController@destroy',
			'as'=>'galeria.destroy'
	]);
	Route::resource('galeria','ImagenesController');
	
	
	/*------- Metadato-------------*/
    Route::resource('metadatos','MetadatoController');
	/*------- descargas-------------*/
    Route::get('descargas/{id}/destroy',[
			'uses'=>'DescargaController@destroy',
			'as'=>'descargas.destroy'
	]);
	Route::resource('descargas','DescargaController');
    /*------- descargas calidad-------------*/
    Route::get('descargas/calidad/{id}/destroy',[
			'uses'=>'DescargaCalidadController@destroy',
			'as'=>'calidad_descarga.destroy'
	]);
	Route::resource('calidad_descarga','DescargaCalidadController');
    
	/*------- Datos de la empresa-------------*/
    Route::resource('datos','DatoController');
    /*------------Home----------------*/
    Route::resource('home', 'HomeController');
    /*------------Calidad----------------*/
    Route::resource('calidad', 'CalidadController');
    /*------------Mision----------------*/
    Route::resource('mision', 'MisionController');
});