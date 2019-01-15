<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => []]);
        $this->middleware('belongstome', ['except' => []]);
    }
    
    public function index()
    {
        return redirect()->route('bases');
        return view('bases');
    }
    
    public function create()
    {
        //
    }
    
    public function store(Request $request)
    {
        //
    }
    
    public function show(About $about)
    {
        return redirect('bases');
        return view('bases');
    }
    
    public function edit(About $about)
    {
        return redirect()->route('bases');
        return view('bases');
    }
    
    public function update(Request $request, About $about)
    {
        //
    }
    
    public function destroy(About $about)
    {
        //
    }
}
