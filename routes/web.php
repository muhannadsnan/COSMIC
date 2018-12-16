<?php

Auth::routes();

Route::resource('/', 'HomeController');
Route::get('/home', 'HomeController@index');

Route::resource('/bases', 'BaseController');
Route::get('/bases', 'BaseController@index')->name('bases');
Route::get('/bases/{basis}/profiles', 'ProfileController@index');
Route::resource('/profiles', 'ProfileController');
Route::get('/bases/{basis}/profiles', 'ProfileController@index');
Route::get('/bases/{basis}/profiles/{profile}', 'ProfileController@show');

Route::resource('/groups', 'GroupController');
Route::resource('/materials', 'MaterialController');
Route::resource('/warehouses', 'WarehouseController');
Route::resource('/accounts', 'AccountController');
Route::resource('/users', 'UserController');
Route::resource('/clients', 'ClientController');
Route::resource('/invoices', 'InvoiceController');
Route::resource('/entries', 'EntryController');
Route::resource('/currencies', 'CurrencyController');
Route::resource('/entryinfos', 'EntryinfoController');
Route::resource('/invoiceinfos', 'InvoiceinfoController');
Route::resource('/invoicetypes', 'InvoicetypeController');
Route::resource('/payments', 'PaymentController');


// Route::get('/', 'HomeController@index')->name('home');