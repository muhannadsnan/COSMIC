<?php

namespace App\Http\Controllers;

use App\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function __construct()
    {
        config(['app.breadcrumb' => @explode('.', $_GET['from'])]);
        $this->middleware('auth', ['except' => []]);
    }

    public function index()
    {        
        return Warehouse::all();
    }
    
    public function create()
    {
        $warehouse = new Warehouse([
            'title' => 't1',
            'desc' => 'd1',
            'code' => 'c1',
            'group_id' => '1',
        ]);
        $warehouse->save();
        return $warehouse;
    }
    
    public function store(Request $request)
    {
        //
    }
    
    public function show(Warehouse $warehouse)
    {
        return $warehouse->_entries;
        return $warehouse;
        return $warehouse->_users;
        return $warehouse->_groups;
        return $warehouse->_materials;
    }
    
    public function edit(Warehouse $warehouse)
    {
        $warehouse->title = 'T1';
        $warehouse->save();
        return $warehouse;
    }
    
    public function update(Request $request, Warehouse $warehouse)
    {
        //
    }
    
    public function destroy(Warehouse $warehouse)
    {
        //
    }
}
