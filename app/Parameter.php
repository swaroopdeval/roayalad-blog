<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    protected $fillable =[
        "params_name",
        "params_value",
        "bidders_name"
    ];
    public function prebids(){
        return $this->belongsToMany('App\Prebid');
    }
}
