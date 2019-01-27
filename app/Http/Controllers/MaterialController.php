<?php

namespace App\Http\Controllers;

use App\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => []]);
        $this->middleware('belongToMe', ['except' => []]);
    }

    public function index()
    {        
        return Material::all();
    }
    
    public function create()
    {
        $material = new Material([
            'title' => 't1',
            'desc' => 'd1',
            'code' => 'c1',
            'group_id' => '1',
        ]);
        $material->save();
        return $material;
    }
    
    public function store(Request $request)
    {
        //
    }
    
    public function show(Material $material)
    { 
        return $material->_invoices;
        return $material;
        return $material->_warehouse;
        return $material->_groups;
        return $material->_parents;
        return $material->_children;
    }
    
    public function edit(Material $material)
    {
        $material->title = 'T1';
        $material->save();
        return $material;
    }
    
    public function update(Request $request, Material $material)
    {
        //
    }
    
    public function destroy(Material $material)
    {
        //
    }
}
