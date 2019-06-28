<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\SearchFullText;

class Music extends Model
{
    use SearchFullText;

    public $timestamps = 'true';

    protected $fillable = [
        'name', 
        'lyric', 
        'view', 
        'path', 
        'author', 
        'rating', 
        'slug', 
        'image', 
        'created_at', 
        'updated_at',
    ];

    public function ratings()
    {
        return $this->hasMany('App\Rating');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'music_category', 'music_id', 'category_id');
    }

    public function playlists()
    {
        return $this->belongsToMany('App\Playlist', 'music_playlist', 'music_id', 'playlist_id');
    }

    public function artists()
    {
        return $this->belongsToMany('App\Artist', 'music_artist', 'music_id', 'artist_id');
    }

    public function albums()
    {
        return $this->belongsToMany('App\Album', 'music_album', 'music_id', 'album_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function favorites()
    {
        return $this->hasMany('App\Favorite');
    }

    public function ranks()
    {
        return $this->hasMany('App\Rank');
    }

    public function tops()
    {
        return $this->hasMany('App\Top');
    }

    protected $searchable = [
        'name',
    ];
}
