<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RelatedInventories extends Model
{
    protected $guarded = [];

    public function inventories()
    {
        return $this->belongsTo('App\Model\Inventory');
    }
}