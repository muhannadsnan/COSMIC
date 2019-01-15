<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use App\Currency;
use App\Base;
use App\Profile;

class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => []]);
        $this->middleware('belongstome', ['except' => []]);
    }


    public function index(Base $basis, Profile $profile)
    {        
        return view('invoices.index', ['invoices' => Invoice::all()]);
    }
    
    public function create(Base $basis, Profile $profile)
    {
        return view('invoices.index', ['currencies' => Currency::all(), 'pay' => config('func.pay')]); 
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
