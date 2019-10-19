<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable =[
        "title",
        "articles",
        "status"
    ];
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
    public function prebids(){
        return $this->belongsToMany('App\Prebids');
    }
}
