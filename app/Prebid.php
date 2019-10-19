<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prebid extends Model
{
    protected $fillable =["bidders_name"];

    public function parameters(){

        return $this->belongsToMany('App\Parameter');
    }
    public function pages(){

        return $this->belongsToMany('App\Page');
    }
}
