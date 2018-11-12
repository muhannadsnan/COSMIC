<?php

namespace App\Http\Controllers;

use App\Material;
use App\Group;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index()
    {        
        return Material::all();
    }
    
    public function create()
    {
        //
    }
    
    public function store(Request $request)
    {
        //
    }
    
    public function show(Material $material)
    {
        $material->_group;
        return $material;
    }
    
    public function edit(Material $material)
    {
        //
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
