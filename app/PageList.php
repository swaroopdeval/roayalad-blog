<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageList extends Model
{
    protected $fillable = [
        'pagetitle',
        'articlelist',
        'tags',
        'status',
        'prebid',      
    ];
}
