<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    
    protected $guarded=[];

    public function user(){

        return $this->belongsTo('App\User');
    
    }
    public function inventory(){

        return $this->belongsTo('App\Model\Inventory');
    
    }

}
