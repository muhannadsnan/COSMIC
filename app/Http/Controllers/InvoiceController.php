<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;

class InvoiceController extends Controller
{
    public function index()
    {        
        return Invoice::all();
    }
    
    public function create()
    {
        $invoice = new Invoice([
            'title' => 't1',
            'desc' => 'd1',
            'code' => 'c1',
            'group_id' => '1',
        ]);
        $invoice->save();
        return $invoice;
    }
    
    public function store(Request $request)
    {
        //
    }
    
    public function show(Invoice $invoice)
    { 
        return $invoice->_profile;
        return $invoice;
        return $invoice->_accounts;
        return $invoice->_users;
        return $invoice->_materials;
        return $invoice->_customers;
    }
    
    public function edit(Invoice $invoice)
    {
        $invoice->title = 'T1';
        $invoice->save();
        return $invoice;
    }
    
    public function update(Request $request, Invoice $invoice)
    {
        //
    }
    
    public function destroy(Invoice $invoice)
    {
        //
    }
}
