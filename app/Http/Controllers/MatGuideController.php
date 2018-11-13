<?php

namespace App\Http\Controllers;

use App\MatGuide;
use Illuminate\Http\Request;

class MatGuideController extends Controller
{
    public function index()
    {        
        return MatGuide::all();
    }
    
    public function create()
    {
        $matGuide = new MatGuide([
            'title' => 't1',
            'desc' => 'd1',
            'code' => 'c1',
            'group_id' => '1',
        ]);
        $matGuide->save();
        return $matGuide;
    }
    
    public function store(Request $request)
    {
        //
    }
    
    public function show(MatGuide $matGuide)
    {
        return $matGuide;
        return $matGuide->_groups;
        return $matGuide->_materials;
    }
    
    public function edit(MatGuide $matGuide)
    {
        $matGuide->title = 'T1';
        $matGuide->save();
        return $matGuide;
    }
    
    public function update(Request $request, MatGuide $matGuide)
    {
        //
    }
    
    public function destroy(MatGuide $matGuide)
    {
        //
    }
}
