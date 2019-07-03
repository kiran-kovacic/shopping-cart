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

Route::get('/', 'ProductsController@welcome');

Route::get('/producten', 'ProductsController@index');

Route::get('/producten/{article}', 'ProductsController@show');

Route::get('/producten/addToCart/{id}', 'ProductsController@addToCart');

Route::get('/cart/addOrRemoveArticle/{id}', 'CartController@addOrRemoveArticle');

Route::get('/cart', 'CartController@index');

Route::get('/flush', 'ProductsController@flushShoppingcart');

Route::group(['middleware' => 'auth'], function() {

    Route::get('/order/{price}', 'OrderController@makeOrder');

    Route::get('/orders', 'OrderController@info');

});

Auth::routes();

Route::get('/categorie/{categorie}', 'ProductsController@category');

Route::get('/categorie/producten/{article}', 'ProductsController@show');