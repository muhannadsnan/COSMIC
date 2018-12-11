<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function __construct()
    {
        config(['app.breadcrumb' => @explode('.', $_GET['from'])]);
        $this->middleware('auth', ['except' => []]);
    }

    public function index()
    {
        return Group::with('_materials')->get();
    }
    
    public function create()
    {
        $group = new Group([
            'title' => 't1',
            'desc' => 'd1',
            'code' => 'c1',
        ]);
        $group->save();
        return $group;
    }
    
    public function store(Request $request)
    {
        //
    }
    
    public function show(Group $group)
    {
        return $group;
        return $group->_users;
        return $group->_warehouse;
        return Group::with('_materials')->where('id', '=', 4)->get();
        return $group->_materials;
        return $group->_parents;
        return $group->_children;
    }
    
    public function edit(Group $group)
    {
        $group->title = 'Zula Kulas III';
        $group->save();
        // $material = new Material(['name' => 'Vacation']);
        // $gr->_materials()->save($material);
        //// $gr->_materials()->attach([3,4]); // or detach()
        //// $gr->_materials()->detach(Material::find(3)); 
        ////                  ->saveMany($categories)
        ////                  ->count()

        // in m:m relationship, we sync the data between the two entities
        //// $gr->_materials()->sync([7, 12, 52, 77]);
        ////                  ->attach([
        //                          3 => ['description' => 'Because San Juan is a tropical island']
        //                      ]);
        //                    ->updateExistingPivot(3, 
        //                          ['description' => 'Sun, beaches and rum!']
        //                      );
        return $group;
    }
    
    public function update(Request $request, Group $group)
    {
        //
    }
    
    public function destroy(Group $group)
    {
        return $group->delete();
    }
}
