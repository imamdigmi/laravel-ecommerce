<?php
Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::resource('categories', 'CategoriesController');
Route::resource('products', 'ProductsController');
