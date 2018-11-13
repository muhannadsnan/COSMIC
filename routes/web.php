<?php

Auth::routes();


Auth::routes();
Route::resource('/', 'HomeController');
Route::resource('/groups', 'GroupController');
Route::resource('/materials', 'MaterialController');
Route::resource('/matGuides', 'MatGuideController');

// Route::get('/', 'HomeController@index')->name('home');