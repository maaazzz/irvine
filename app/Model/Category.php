<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

<<<<<<< HEAD


    public function inventories(){
=======
    public function inventories()
    {
>>>>>>> 0b128b14cb19db4db1ed20867853def8441a2c49
        return $this->hasMany('App\Model\Inventory');
    }
}