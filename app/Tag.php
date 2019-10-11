<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['page_list_id', 'page_list_tag_id'];

    protected $with = ['tag'];

    public function tag()
    {
        return $this->belongsTo('App\PageListTag', 'page_list_tag_id', 'id');
    }    
 
}