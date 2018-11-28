<?php

namespace App\Http\Controllers;

use App\Invoiceinfo;
use App\Group;
use Illuminate\Http\Request;

class InvoiceinfoController extends Controller
{
    public function index()
    {        
        return Invoiceinfo::all();
    }
    
    public function create()
    {
        $invoiceinfo = new Invoiceinfo([
            'title' => 't1',
            'desc' => 'd1',
            'code' => 'c1',
            'group_id' => '1',
        ]);
        $invoiceinfo->save();
        return $invoiceinfo;
    }
    
    public function store(Request $request)
    {
        //
    }
    
    public function show(Invoiceinfo $invoiceinfo)
    { 
        return $invoiceinfo;
    }
    
    public function edit(Invoiceinfo $invoiceinfo)
    {
        $invoiceinfo->title = 'T1';
        $invoiceinfo->save();
        return $invoiceinfo;
    }
    
    public function update(Request $request, Invoiceinfo $invoiceinfo)
    {
        //
    }
    
    public function destroy(Invoiceinfo $invoiceinfo)
    {
        //
    }
}
