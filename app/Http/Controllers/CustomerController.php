<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    public function index()
    {        
        return Customer::all();
    }
    
    public function create()
    {
        $customer = new Customer([
            'title' => 't1',
            'desc' => 'd1',
            'code' => 'c1',
            'group_id' => '1',
        ]);
        $customer->save();
        return $customer;
    }
    
    public function store(Request $request)
    {
        //
    }
    
    public function show(Customer $customer)
    { 
        return $customer->_account;
        return $customer;
        return $customer->_users;
    }
    
    public function edit(Customer $customer)
    {
        $customer->title = 'T1';
        $customer->save();
        return $customer;
    }
    
    public function update(Request $request, Customer $customer)
    {
        //
    }
    
    public function destroy(Customer $customer)
    {
        //
    }
}
