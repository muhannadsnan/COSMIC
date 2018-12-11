<?php

namespace App\Http\Controllers;

use App\Profile;
use App\Base;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        config(['app.breadcrumb' => @explode('.', $_GET['from'])]);
        $this->middleware('auth', ['except' => []]);
    }

    public function index()
    {        
        return view('profiles.index', ['from'=>config('app.breadcrumb'), 'base'=>Base::find(config('app.breadcrumb')[1])]);
        return Profile::all();
    }
    
    public function create()
    {
        return view('profiles.index', ['from'=>config('app.breadcrumb'), 'base'=>Base::find(config('app.breadcrumb')[1])]);
    }
    
    public function store(Request $request)
    {
        //
    }
    
    public function show(Profile $profile)
    { 
        return $profile->_currencies;
        return $profile;
        return $profile->_entries;
        return $profile->_invoices;
        return $profile->_clients;
        return $profile->_users;
        return $profile->_accounts;
        return $profile->_materials;
        return $profile->_warehouses;
        return $profile->_groups;
    }
    
    public function edit(Profile $profile)
    {
        $profile->title = 'T1';
        $profile->save();
        return $profile;
    }
    
    public function update(Request $request, Profile $profile)
    {
        //
    }
    
    public function destroy(Profile $profile)
    {
        //
    }
}
