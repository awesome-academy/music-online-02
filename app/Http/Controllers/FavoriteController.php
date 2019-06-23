<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Music;
use App\Favorite;

class FavoriteController extends Controller
{
    public function like(Request $request){
        $favorite = new Favorite;
        $favorite->user_id = $request->user_ID;
        $favorite->music_id = $request->songId;
        $favorite->save();
    }

    public function unlike(Request $request){
        $user_id = $request->user_ID;
        $music_id = $request->songId;
        Favorite::where('user_id',$user_id)
            ->where('music_id',$music_id)
            ->delete();
    }
}
