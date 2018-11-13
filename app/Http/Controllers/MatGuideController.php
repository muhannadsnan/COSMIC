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
        $mGuide = new MatGuide([
            'title' => 't1',
            'desc' => 'd1',
            'code' => 'c1',
            'group_id' => '1',
        ]);
        $mGuide->save();
        return $mGuide;
    }
    
    public function store(Request $request)
    {
        //
    }
    
    public function show(MatGuide $mGuide)
    {
        return $mGuide->_materials;
        return $mGuide;
    }
    
    public function edit(MatGuide $mGuide)
    {
        $mGuide->title = 'T1';
        $mGuide->save();
        return $mGuide;
    }
    
    public function update(Request $request, MatGuide $mGuide)
    {
        //
    }
    
    public function destroy(MatGuide $mGuide)
    {
        //
    }
}
