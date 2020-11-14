<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];


    // location
    public function location()
    {
        return $this->belongsTo('App\Model\Location');
    }

    // project number
    public function projectNumber()
    {
        return $this->belongsTo('App\Model\ProjectNumber');
    }

    // project number
    public function accountNumber()
    {
        return $this->belongsTo('App\Model\AccountNumber');
    }

    // justification
    public function justification()
    {
        return $this->belongsTo('App\Model\Justification');
    }

    // ineventory
    public function inventory()
    {
        return $this->belongsTo('App\Model\Inventory');
    }

    // shopper  id
    public function shopper()
    {
        return $this->belongsTo('App\User', 'shopper_id');
    }

    public function approver()
    {
        return $this->belongsTo('App\User', 'approver_id');
    }
}
