<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AccountNumber extends Model
{
    protected $guarded = [];

    public function orders()
    {
        return $this->hasMany('App\Model\Order');
    }
}