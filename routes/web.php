<?php

Route::get('/', 'TestController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/{id}', 'ProductController@show');//

Route::post('/cart', 'CartDetailController@store');//
Route::delete('/cart', 'CartDetailController@destroy');//

Route::post('/order', 'CartController@update');//

Route::middleware(['auth', 'admin'])->prefix('admin')->namespace('Admin')->group(function () {

	Route::get('/products', 'ProductController@index');//listar
	Route::get('/products/create', 'ProductController@create');//ver datos
	Route::post('/products', 'ProductController@store');//guardar datos
	// C=create R=read
	Route::get('/products/{id}/edit', 'ProductController@edit');//ver datos
	Route::post('/products/{id}/edit', 'ProductController@update');//actualizar
	Route::post('/products/{id}/delete', 'ProductController@destroy');//actualizar
	//U=update D=delete

	Route::get('/products/{id}/images', 'ImageController@index');//img
	Route::post('/products/{id}/images', 'ImageController@store');
	Route::delete('/products/{id}/images', 'ImageController@destroy');//eliminar
	Route::get('/products/{id}/images/select/{image}', 'ImageController@select');//DestacarImg
	
});