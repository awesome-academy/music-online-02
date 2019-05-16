<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    public $timestamps = 'true';

    public function musics()
    {
        return $this->belongsToMany('App\Music', 'music_playlist', 'playlist_id', 'music_id');
    }
}
