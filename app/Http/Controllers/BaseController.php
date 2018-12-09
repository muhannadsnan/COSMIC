<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Base;

class BaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {        
        return view('bases.index');
        return Base::all();
    }
    
    public function create()
    {
        $basis = new Base([
            'title' => 't1',
            'desc' => 'd1',
            'code' => 'c1',
            'group_id' => '1',
        ]);
        $basis->save();
        return $basis;
    }
    
    public function store(Request $request)
    {
        // dd($request->all());
        $newBase = Base::create([
            'title' => $request->title,
            'materials' => $request->materials,
            'groups' => $request->groups,
            'user_id' => auth()->id(),
        ]);
        return redirect("/bases/{$newBase->id}");
    }
    
    public function show(Base $basis)
    { 
        return $basis;
        return $basis->_user;
    }
    
    public function edit(Base $basis)
    {
        $basis->title = 'T1';
        $basis->save();
        return $basis;
    }
    
    public function update(Request $request, Base $basis)
    {
        //
    }
    
    public function destroy(Base $basis)
    {
        //
    }
}
