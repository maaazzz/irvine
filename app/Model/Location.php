<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function inventories(){
        return $this->hasMany('App\Model\Inventory');
    }
}
