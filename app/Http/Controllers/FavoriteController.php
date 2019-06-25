<?php

namespace App\Http\Controllers;

use App\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function like(Request $request) 
    {
        $favorite = new Favorite;
        $favorite->user_id = $request->user_id;
        $favorite->music_id = $request->song_id;
        $favorite->save();
    }

    public function unlike(Request $request) 
    {
        $user_id = $request->user_id;
        $music_id = $request->song_id;
        Favorite::where('user_id', $user_id)
            ->where('music_id', $music_id)
            ->delete();
    }
}
