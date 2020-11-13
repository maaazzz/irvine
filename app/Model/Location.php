<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
    protected $gaurded = [];
    public function inventories(){
        return $this->hasMany('App\Model\Inventory');
    }
}
