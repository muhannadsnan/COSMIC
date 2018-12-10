<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $obj;
    public function __construct()
    {
        $this->obj = new User();
        $this->obj->getFromUrl(@$_GET['from']);
        $this->middleware('auth', ['except' => []]);
    }

    public function index()
    {        
        return User::all();
    }
    
    public function create()
    {
        $user = new User([
            'title' => 't1',
            'desc' => 'd1',
            'code' => 'c1',
            'group_id' => '1',
        ]);
        $user->save();
        return $user;
    }
    
    public function store(Request $request)
    {
        //
    }
    
    public function show(User $user)
    { 
        return $user;
        return $user->_bases;
        return $user->_currencies;
        return $user->_warehouse;
        return $user->_entries;
        return $user->_invoices;
        return $user->_clients;
        return $user->_profile;
        return $user->_groups;
        return $user->_accounts;
    }
    
    public function edit(User $user)
    {
        $user->title = 'T1';
        $user->save();
        return $user;
    }
    
    public function update(Request $request, User $user)
    {
        //
    }
    
    public function destroy(User $user)
    {
        //
    }
}
