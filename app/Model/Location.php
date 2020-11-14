<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'loc_name','contact_person','telephone','email','contact_details'
    ];

    //
    protected $gaurded = [];
    public function inventories(){
        return $this->hasMany('App\Model\Inventory');
    }
}
