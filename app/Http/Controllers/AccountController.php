<?php

namespace App\Http\Controllers;

use App\Account;
use App\Base;
use App\Profile;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => []]);
    }

    public function index(Base $basis, Profile $profile)
    {
        return view('accounts.index', ['accounts' => Account::where('profile_id', null) // the default accounts have no profile_id
                                                            ->orWhere('profile_id', $profile->id)->with("_parents")->get()/* ,   'noscript' => 1  */]); // noscript because I use script to make the treeview
    }
    
    public function create(Base $basis, Profile $profile)
    {
        return view('accounts.create');
    }
    
    public function store(Request $request)
    {
        //
    }
    
    public function show(Base $basis, Profile $profile, Account $account)
    { 
        return view('accounts.show', []);
    }
    
    public function edit(Base $basis, Profile $profile, Account $account)
    {
        $account->title = 'T1';
        $account->save();
        return $account;
    }
    
    public function update(Request $request, Base $basis, Profile $profile, Account $account)
    {
        //
    }
    
    public function destroy(Base $basis, Profile $profile, Account $account)
    {
        //
    }
}
