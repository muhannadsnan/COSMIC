<?php
use Illuminate\Http\Request;
 
Route::get('/invoices/{profile}/test', function (Request $request) {
    return \App\Invoice::getMaxSerial();
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:api', 'bindings', 'belongToMe']], function (){
    Route::prefix('/invoices')->group(function (){
        Route::get('/{profile}/findBySerial', 'InvoiceController@findBySerial');
        Route::post('/{profile}', 'InvoiceController@apiStore');
        Route::put('/{profile}', 'InvoiceController@apiUpdate');
        Route::get('/{profile}/searchClientsByName', 'InvoiceController@searchClientsByName');
        Route::get('/{profile}/getClientsList', 'InvoiceController@getClientsList');
        Route::get('/{profile}/getSerials/{NType}', 'InvoiceController@getSerials');
    });
    Route::prefix('/accounts')->group(function (){
        Route::get('/{profile}/findBySerial', 'AccountController@findBySerial');
        Route::post('/{profile}', 'AccountController@apiStore');
        Route::put('/{profile}', 'AccountController@apiUpdate');
        Route::get('/{profile}/searchClientsByName', 'AccountController@searchClientsByName'); 
        Route::get('/{profile}/getSerials/{NType}', 'AccountController@getSerials');
    });
});