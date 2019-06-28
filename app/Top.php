<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Top extends Model
{
    public $timestamps = 'true';

    public function music()
    {
        return $this->belongsTo('App\Music', 'music_id', 'id');
    }

    public function week()
    {
        return $this->belongsTo('App\Week', 'week_id', 'id');
    }
}
