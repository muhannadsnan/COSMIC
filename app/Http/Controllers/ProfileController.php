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
        // $this->middleware('auth', ['except' => []]);
    }

    public function index()
    {        
        return Profile::all();
        return view('profiles.index', ['from'=>config('app.breadcrumb')]);
    }
    
    public function create()
    {
        return view('profiles.index', ['from'=>config('app.breadcrumb')]);
    }
    
    public function store(Request $request)
    {
        //
    }
    
    public function show(Profile $profile)
    { 
        return $profile;
        return $profile->_base;
        return $profile->_currencies;
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
