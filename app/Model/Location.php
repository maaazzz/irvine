<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    
    protected $guarded = [];
    public function inventories()
    {
        return $this->hasMany('App\Model\Inventory');
    }
}
