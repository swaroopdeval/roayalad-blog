<?php

namespace App;

use Cviebrock\EloquentTaggable\Taggable;
use Illuminate\Database\Eloquent\Model;

class PageList extends Model
{
    use Taggable;
    protected $fillable = [
        'pagetitle',
        'articlelist',
        'tags',
        'status',
        'prebid',      
    ];
}
