<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $keyType = 'bigInteger';
    public $timestamps = false;

    public function counties(){
        return $this->hasMany('App\County_City');
    }
}
