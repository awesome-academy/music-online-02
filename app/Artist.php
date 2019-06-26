<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    public $timestamps = 'true';

    public function musics()
    {
        return $this->belongsToMany('App\Music', 'music_artist', 'artist_id', 'music_id');
    }

    public function albums()
    {
        return $this->belongsToMany('App\Album', 'artist_album', 'artist_id', 'album_id');
    }

    public function scopeLoimage($image)
    {
        return 'images/' . $image;
    }

    protected $searchable = [
        'name',
    ];
}
