<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entry;

class EntryController extends Controller
{
    public function index()
    {        
        return Entry::all();
    }
    
    public function create()
    {
        $entry = new Entry([
            'title' => 't1',
            'desc' => 'd1',
            'code' => 'c1',
            'group_id' => '1',
        ]);
        $entry->save();
        return $entry;
    }
    
    public function store(Request $request)
    {
        //
    }
    
    public function show(Entry $entry)
    { 
        return $entry->_users;
        return $entry;
        return $entry->_invoices;
    }
    
    public function edit(Entry $entry)
    {
        $entry->title = 'T1';
        $entry->save();
        return $entry;
    }
    
    public function update(Request $request, Entry $entry)
    {
        //
    }
    
    public function destroy(Entry $entry)
    {
        //
    }
}
