<?php

namespace App\Http\Controllers;

use App\Invoicetype;
use Illuminate\Http\Request;

class InvoicetypeController extends Controller
{
    public function __construct()
    {
        config(['app.breadcrumb' => @explode('.', $_GET['from'])]);
        $this->middleware('auth', ['except' => []]);
    }

    public function index()
    {        
        return Invoicetype::all();
    }
    
    public function create()
    {
        $invoicetype = new Invoicetype([
            'title' => 't1',
            'desc' => 'd1',
            'code' => 'c1',
            'group_id' => '1',
        ]);
        $invoicetype->save();
        return $invoicetype;
    }
    
    public function store(Request $request)
    {
        //
    }
    
    public function show(Invoicetype $invoicetype)
    { 
        return $invoicetype;
    }
    
    public function edit(Invoicetype $invoicetype)
    {
        $invoicetype->title = 'T1';
        $invoicetype->save();
        return $invoicetype;
    }
    
    public function update(Request $request, Invoicetype $invoicetype)
    {
        //
    }
    
    public function destroy(Invoicetype $invoicetype)
    {
        //
    }
}
