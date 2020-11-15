<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    protected $guarded = [];

    // inverse with users
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // inverse with inventory
    public function inventory()
    {
        return $this->belongsTo('App\Model\Inventory');
    }
}