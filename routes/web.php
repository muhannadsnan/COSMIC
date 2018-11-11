<?php

Auth::routes();


Auth::routes();
Route::resource('/', 'HomeController');
Route::resource('/groups', 'GroupController');
Route::resource('/materials', 'MaterialController');

// Route::get('/', 'HomeController@index')->name('home');