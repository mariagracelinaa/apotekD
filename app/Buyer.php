<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    //Week 8
    public function transaction(){
        return $this->hasMany('App\Transaction','buyer_id','id');
    }
}
