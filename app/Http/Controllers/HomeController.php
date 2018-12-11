<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $obj;
    public function __construct()
    {
        $this->middleware('auth', ['except' => []]);
    } 
    
    public function index()
    {
        return redirect()->route('home');
        return view('home');
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
        return redirect('home');
        return view('home');
    }
    
    public function edit(About $about)
    {
        return redirect()->route('home');
        return view('home');
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
