<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class County_City extends Model
{
    protected $table = 'counties_cities';
    protected $keyType = 'bigInteger';
    public $timestamps = false;

    public function state(){
        return $this->belongsTo('App\State');
    }

}
