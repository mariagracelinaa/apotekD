<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    //Week 8
    //karena many maka pakai s
    public function transactions(){
        return $this->hasMany('App\Transaction','buyer_id','id');
    }
}
