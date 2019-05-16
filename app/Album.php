<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    public $timestamps = 'true';

    public function musics()
    {
        return $this->belongsToMany('App\Music', 'music_album', 'album_id', 'music_id');
    }

    public function artists()
    {
        return $this->belongsToMany('App\Artist', 'artist_album', 'album_id', 'artist_id');
    }
}
