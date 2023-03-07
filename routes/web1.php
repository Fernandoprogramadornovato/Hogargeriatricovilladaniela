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

Route::get('/', function () {
    //return view('welcome');
    return view('auth.login');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');


	Route::get('table-list-clientes','HomeController@clientes')->name('tableclientes');

	Route::get('qrclientes','HomeController@clientesqr')->name('tableqr');

	Route::get('imprimir/{codigodespacho}', 'HomeController@imprimir');


	Route::get('permisocanal', 'HomeController@permisosalida')->name('permisocanal');

	
	Route::get('listadespachos','HomeController@listadespachos')->name('listadespachos');


	Route::get('listaconductores','HomeController@listaconductor')->name('listaconductores');


	Route::get('guardarconductores','HomeController@Gconductores')->name('guardarconductores');
	

	Route::get('verificarlista','HomeController@verificarganado')->name('verificarlista');

	Route::get('enviarcanales','HomeController@guardarcanales')->name('enviarcanales');

	Route::get('infocanaldespacho/{codigo}','HomeController@detalledespachocanal');
	Route::get('carteracliente/{codigo}','HomeController@carteracliente');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

