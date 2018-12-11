<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function __construct()
    {
        config(['app.breadcrumb' => @explode('.', $_GET['from'])]);
        $this->middleware('auth', ['except' => []]);
    }

    public function index()
    {        
        return Account::all();
    }
    
    public function create()
    {
        $account = new Account([
            'title' => 't1',
            'desc' => 'd1',
            'code' => 'c1',
            'group_id' => '1',
        ]);
        $account->save();
        return $account;
    }
    
    public function store(Request $request)
    {
        //
    }
    
    public function show(Account $account)
    { 
        return $account;
        return $account->_invoices;
        return $account->_currency;
        return $account->_clients;
        return $account->_profile;
        return $account->_users;
        return $account->_closingAccount;
        return $account->_childAccount;
    }
    
    public function edit(Account $account)
    {
        $account->title = 'T1';
        $account->save();
        return $account;
    }
    
    public function update(Request $request, Account $account)
    {
        //
    }
    
    public function destroy(Account $account)
    {
        //
    }
}
