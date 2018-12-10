<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $obj;
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show', 'edit']]);
    } 
    
    public function index()
    {
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
        return "show !!!";
        return view('home');
    }
    
    public function edit(About $about)
    {
        return "edit !!!";
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
