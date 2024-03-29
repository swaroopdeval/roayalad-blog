<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    protected $fillable =["name"];

    public function posts(){

        return $this->belongsToMany('App\Post');
    }

    
    public function pages(){

        return $this->belongToMany('App\Page');
    }
}
