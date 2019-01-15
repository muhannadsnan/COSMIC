<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => []]);
        $this->middleware('belongstome', ['except' => []]);
    }

    public function index()
    {        
        return Client::all();
    }
    
    public function create()
    {
        $client = new Client([
            'title' => 't1',
            'desc' => 'd1',
            'code' => 'c1',
            'group_id' => '1',
        ]);
        $client->save();
        return $client;
    }
    
    public function store(Request $request)
    {
        //
    }
    
    public function show(Client $client)
    { 
        return $client->_invoices;
        return $client;
        return $client->_profile;
        return $client->_account;
        return $client->_users;
    }
    
    public function edit(Client $client)
    {
        $client->title = 'T1';
        $client->save();
        return $client;
    }
    
    public function update(Request $request, Client $client)
    {
        //
    }
    
    public function destroy(Client $client)
    {
        //
    }
}
