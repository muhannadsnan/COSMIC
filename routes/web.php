<?php

Auth::routes();


Auth::routes();
Route::resource('/', 'HomeController');
Route::resource('/groups', 'GroupController');
Route::resource('/materials', 'MaterialController');
Route::resource('/warehouses', 'WarehouseController');
Route::resource('/profiles', 'ProfileController');
Route::resource('/accounts', 'AccountController');
Route::resource('/users', 'UserController');
Route::resource('/clients', 'ClientController');
Route::resource('/invoices', 'InvoiceController');
Route::resource('/entries', 'EntryController');
Route::resource('/currencies', 'CurrencyController');

// Route::get('/', 'HomeController@index')->name('home');