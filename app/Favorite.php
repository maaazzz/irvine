<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    
    protected $guarded=[];

    public function user(){

        return $this->belongsTo('App\User');
    
    }
<<<<<<< HEAD
    public function inventory(){

        return $this->belongsTo('App\Model\Inventory');
=======
    public function products(){

        return $this->belongsTo('App\Model\Product');
>>>>>>> 3d106469a9d1b0f4a5d7b8cb313feae21b767bc5
    
    }

}
