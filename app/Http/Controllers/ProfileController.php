<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {        
        return Profile::all();
    }
    
    public function create()
    {
        $profile = new Profile([
            'title' => 't1',
            'desc' => 'd1',
            'code' => 'c1',
            'group_id' => '1',
        ]);
        $profile->save();
        return $profile;
    }
    
    public function store(Request $request)
    {
        //
    }
    
    public function show(Profile $profile)
    { 
        return $profile->_invoices;
        return $profile;
        return $profile->_customers;
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
