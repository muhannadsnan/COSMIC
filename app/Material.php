<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends _Model
{
    public function _groups()
    {
        return $this->belongsToMany(Group::class, 'group_material', 'material_id', 'group_id');
    }

    public function _parents()
    {
        return $this->belongsToMany(Material::class, 'material_material', 'child_id', 'parent_id');
    }

    public function _children()
    {
        return $this->belongsToMany(Material::class, 'material_material', 'parent_id', 'child_id');
    }

    public function _warehouses()
    {
        return $this->belongsToMany(Warehouse::class, 'material_warehouse', 'material_id', 'warehouse_id');
    }

    public function _invoices()
    {
        return $this->belongsToMany(Invoice::class, 'invoice_material', 'material_id', 'invoice_id');
    }
}
