<?php

Auth::routes();


Auth::routes();
Route::resource('/', 'HomeController');
Route::resource('/groups', 'GroupController');
Route::resource('/materials', 'MaterialController');
Route::resource('/matGuides', 'MatGuideController');
Route::resource('/profiles', 'ProfileController');
Route::resource('/accounts', 'AccountController');
Route::resource('/users', 'UserController');
Route::resource('/customers', 'CustomerController');

// Route::get('/', 'HomeController@index')->name('home');