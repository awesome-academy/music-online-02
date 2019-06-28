<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    public $timestamps = 'true';
    
    public function ranks()
    {
        return $this->hasMany('App\Rank');
    }

    public function tops()
    {
        return $this->hasMany('App\Top');
    }
}
