<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageList extends Model
{  
    protected $fillable = [
        'pagetitle',
        'articlelist',
        'status',
        'prebid',   
    ];

    protected $with = ['tags'];

    public function tags(){
        return $this->hasMany('App\Tag');
    }
}
