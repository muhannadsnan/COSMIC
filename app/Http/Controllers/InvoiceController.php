<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use App\Base;
use App\Profile;

class InvoiceController extends Controller
{
    public function __construct()
    {
        config(['app.breadcrumb' => @explode('.', $_GET['from'])]);
        $this->middleware('auth', ['except' => []]);
    }


    public function index(Base $basis, Profile $profile)
    {        
        return view('invoices.index', ['invoices' => Invoice::all()]);
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
        return $invoice;
        return $invoice->_payment;
        return $invoice->_entry;
        return $invoice->_currency;
        return $invoice->_profile;
        return $invoice->_accounts;
        return $invoice->_users;
        return $invoice->_materials;
        return $invoice->_clients;
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
