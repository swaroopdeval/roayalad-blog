<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable =["title"];

    public function tags(){

        return $this->belongsToMany('App\Tag');
    }
}

