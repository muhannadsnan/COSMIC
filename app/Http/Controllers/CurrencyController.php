<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Currency;

class CurrencyController extends Controller
{
    public function index()
    {        
        return Currency::all();
    }
    
    public function create()
    {
        $currency = new Currency([
            'title' => 't1',
            'desc' => 'd1',
            'code' => 'c1',
            'group_id' => '1',
        ]);
        $currency->save();
        return $currency;
    }
    
    public function store(Request $request)
    {
        //
    }
    
    public function show(Currency $currency)
    { 
        return $currency;
        return $currency->_accounts;
    }
    
    public function edit(Currency $currency)
    {
        $currency->title = 'T1';
        $currency->save();
        return $currency;
    }
    
    public function update(Request $request, Currency $currency)
    {
        //
    }
    
    public function destroy(Currency $currency)
    {
        //
    }
}
