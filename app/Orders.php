<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    public function articles()
    {
        return $this->belongsToMany('App\Articles');
    }
}
