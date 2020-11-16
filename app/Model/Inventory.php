<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    public function getImageAttribute()
    {
        return explode(',', $this->images)[0];
    }
    //
    protected $guarded = [];


    public function category()
    {
        return $this->belongsTo('App\Model\Category');
    }

    public function favorite()
    {
        return $this->hasMany('App\Favorite');
    }

    public function location()
    {
        return $this->belongsTo('App\Model\Location');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function orders()
    {
        return $this->hasMany('App\Model\Order');
    }

    // relation with favourite
    public function favourites()
    {
        return $this->hasMany('App\Model\Favourite');
    }

    // relation with related inventories
    public function relatedInventories()
    {
        return $this->hasMany('App\Model\RelatedInventories');
    }
}