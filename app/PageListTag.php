<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageListTag extends Model
{
    public function pagelist()
    {
    	return $this->hasOne('App\PageList');
    }
}
