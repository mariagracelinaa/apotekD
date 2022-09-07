<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //week 8
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    public function buyer(){
        return $this->belongsTo('App\Buyer','buyer_id');
        //abc
    }

    //many to many
    public function medicines(){
        return $this->belongsToMany('App\Medicine','medicine_transaction','transaction_id','medicine_id')
                    ->withPivot('quantity','price');
    }
}
