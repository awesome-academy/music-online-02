<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = 'true';

    public function musics()
    {
        return $this->belongsToMany('App\Music', 'music_category', 'category_id', 'music_id');
    }
}
