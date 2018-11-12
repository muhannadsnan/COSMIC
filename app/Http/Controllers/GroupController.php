<?php

namespace App\Http\Controllers;

use App\Group;
use App\Material;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {        
        return Group::with('_materials')->get();
    }
    
    public function create()
    {
        //
    }
    
    public function store(Request $request)
    {
        //
    }
    
    public function show(Group $group)
    {
        // return Group::with('_materials')->where('id', '=', 4)->get();
        $group->_materials; // this brings the materials, so then they can be shown
        return $group;
    }
    
    public function edit(Group $group)
    {
        //
    }
    
    public function update(Request $request, Group $group)
    {
        //
    }
    
    public function destroy(Group $group)
    {
        //
    }
}
