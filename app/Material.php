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

    public function _matGuide()
    {
        return $this->belongsTo(MatGuide::class, 'mat_guide_id');
    }

    public function _invoices()
    {
        return $this->belongsToMany(MatGuide::class, 'invoice_material', 'material_id', 'invoice_id');
    }
}
