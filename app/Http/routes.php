<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/**
 *

 **/
Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);


//Route::get('usuario/restore', 'UserController@restore');
//RUTAS PARA USUARIOS
Route::get('restore/{id}', array('uses' => 'UserController@restore', 'as' => 'restore'));
Route::get('logout', 'LoginController@logout');
Route::resource('login', 'LoginController');
Route::resource('usuario', 'UserController');

Route::resource('edicion', 'DocumentController');

//RUTAS PARA EMPRESAS
Route::get('/empresas', 'EnterpriseController@combo');
Route::resource('empresa', 'EnterpriseController');

//RUTAS PARA PAIS
Route::get('/paises', 'CountryController@combo');
Route::resource('pais', 'CountryController');

//Route::get('/ftp', ['as ' => 'ftp', 'uses' => 'FtpController@index']);
Route::get('view/{folder}/{filename}', array('uses' => 'FTPController@view', 'as' => 'view'));
Route::get('download/{folder}/{filename}', array('uses' => 'FTPController@download', 'as' => 'download'));
Route::get('/archivos', 'FTPController@loadFiles');
Route::resource('ftp', 'FTPController');


//RUTAS PARA OPCIONES
Route::resource('opcion','OpcionController');