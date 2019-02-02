<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:api', 'bindings', 'belongToMe']], function (){
    Route::get('/invoices/{profile}/findBySerial', 'InvoiceController@findBySerial');
    Route::post('/invoices/{profile}', 'InvoiceController@apiStore');
    Route::put('/invoices/{profile}', 'InvoiceController@apiUpdate');
    Route::get('/invoices/{profile}/searchClientsByName', 'InvoiceController@searchClientsByName');
    Route::get('/invoices/{profile}/getClientsList', 'InvoiceController@getClientsList');
});