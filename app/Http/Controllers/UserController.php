<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
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
        return $user->_accounts;
        return $user;
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
