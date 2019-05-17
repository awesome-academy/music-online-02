<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps = 'true';

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
