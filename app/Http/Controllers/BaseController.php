<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Base;

class BaseController extends Controller
{
    public function index()
    {        
        return Base::all();
    }
    
    public function create()
    {
        $base = new Base([
            'title' => 't1',
            'desc' => 'd1',
            'code' => 'c1',
            'group_id' => '1',
        ]);
        $base->save();
        return $base;
    }
    
    public function store(Request $request)
    {
        //
    }
    
    public function show(Base $base)
    { 
        return $base;
    }
    
    public function edit(Base $base)
    {
        $base->title = 'T1';
        $base->save();
        return $base;
    }
    
    public function update(Request $request, Base $base)
    {
        //
    }
    
    public function destroy(Base $base)
    {
        //
    }
}
