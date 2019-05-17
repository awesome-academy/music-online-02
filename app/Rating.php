<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public $timestamps = 'true';

    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function musics()
    {
        return $this->belongsTo('App\Music');
    }
}
