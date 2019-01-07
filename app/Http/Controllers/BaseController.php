<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Base;
use App\Profile;
use App\Currency;

class BaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => []]);
    }

    public function index()
    {        
        $currencies = Currency::all()->pluck('title', 'id')->toArray(); //dd($currencies);
        return view('bases.index', ['currencies' => $currencies]);
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
            'accGuide' => $request->accGuide ? 1 : 0,
            'reqPass' => $request->reqPass ? 1 : 0,
            'user_id' => auth()->id(),
        ]);
        $firstProfile = Profile::create([
            'Title' => $request->profileTitle,
            'code' => "new code.",
            'endPeriodDate' => $request->endPeriodDate,
            'startPeriodDate' => $request->startPeriodDate,
            'base_id' => $newBase->id,
        ]);
        $firstProfile->_currencies()->sync([$request->currency]);
        return redirect("/bases/{$newBase->id}/profiles/{$firstProfile->id}");
    }
    
    public function show(Base $basis)
    { 
        session(['app.base' => $basis]);        
        return view('bases.show', ['base' => $basis, 'currencies' => Currency::all()->pluck('title', 'id')->toArray()]); 
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
