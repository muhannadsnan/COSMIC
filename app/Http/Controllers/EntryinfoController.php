<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entryinfo;

class EntryinfoController extends Controller
{
    public function index()
    {        
        return Entryinfo::all();
    }
    
    public function create()
    {
        $entryinfo = new Entryinfo([
            'title' => 't1',
            'desc' => 'd1',
            'code' => 'c1',
            'group_id' => '1',
        ]);
        $entryinfo->save();
        return $entryinfo;
    }
    
    public function store(Request $request)
    {
        //
    }
    
    public function show(Entryinfo $entryinfo)
    { 
        return $entryinfo->_entry;
        return $entryinfo;
    }
    
    public function edit(Entryinfo $entryinfo)
    {
        $entryinfo->title = 'T1';
        $entryinfo->save();
        return $entryinfo;
    }
    
    public function update(Request $request, Entryinfo $entryinfo)
    {
        //
    }
    
    public function destroy(Entryinfo $entryinfo)
    {
        //
    }
}
