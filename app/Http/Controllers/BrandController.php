<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Brand;
use App\Group;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        return "dddd";
        // return view('brands.index');
        $x = Group::all();
        return $x;
    }
    
    public function create()
    {
        // return "BrandController@create";

        // $x = Category::create([
        //     'title' => 'dd',
        //     'desc' => 'desccc'
        //     ]);
        // $newP = new Product();
        // $newP->title = 'dd';
        // $newP->desc = 'desccc';
        // $newP->ext = 'eee';
        // $newP->cat_id = $x->id;
        // $newP->save();
    }
    
    public function store(Request $request)
    {
        //
    }
    
    public function show($id)
    {
        $x = Category::where('id', '=', $id);
        return $x->with('products')->get();
    }
    
    public function edit(Product $product)
    {
        //
    }
    
    public function update(Request $request, Product $product)
    {
        //
    }
    
    public function destroy(Product $product)
    {
        //
    }
}
