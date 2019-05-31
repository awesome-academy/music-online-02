<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps = 'true';

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function music()
    {
        return $this->belongsTo('App\Musics', 'music_id', 'id');
    }
}
