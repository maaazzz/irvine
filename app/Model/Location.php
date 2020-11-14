<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
<<<<<<< HEAD
    protected $fillable = [
        'loc_name','contact_person','telephone','email','contact_details'
    ];

    //
    protected $gaurded = [];
    public function inventories(){
        return $this->hasMany('App\Model\Inventory');
    }
}
=======
    
    protected $guarded = [];
    public function inventories()
    {
        return $this->hasMany('App\Model\Inventory');
    }
}
>>>>>>> 0b128b14cb19db4db1ed20867853def8441a2c49
