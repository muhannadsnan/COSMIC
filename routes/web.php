<?php

Auth::routes();

Route::resource('/', 'HomeController');
// Route::get('/', 'HomeController@index')->name('home');

Route::resource('/brands', 'BrandController');

Route::resource('/categories', 'CategoryController');

Route::resource('/products', 'ProductController');
