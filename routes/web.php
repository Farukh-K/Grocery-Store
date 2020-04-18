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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/products', 'ProductsController@index')->name('product.show');

Route:: get('/products/create','ProductsController@create');

Route:: post('/products','ProductsController@store');

Route::delete('/products/delete/{product}', 'ProductsController@destroy');

Route::get('/warehouses', 'WarehousesController@index')->name('warehouse.show');

Route::get('/warehouses/add', 'WarehousesController@create');

Route::post('/warehouses/add', 'WarehousesController@store');

Route::get('/showcaseproducts', 'ShowcaseproductsController@index')->name('showcaseproducts.show');

Route::get('/showcaseproducts/remove', 'ShowcaseproductsController@remove');

Route::post('/showcaseproducts/remove', 'ShowcaseproductsController@store');

