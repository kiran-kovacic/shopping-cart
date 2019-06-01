<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    public function Categorie()
    {
        return $this->belongsTo('App\Categorie');
    }
}
