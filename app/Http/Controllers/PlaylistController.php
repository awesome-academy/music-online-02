<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Playlist;
use App\User;

class PlaylistController extends Controller
{
    public function create(Request $request)
    {
        $playlist = new Playlist();
        $playlist->name = $request->name_playlist;
        $playlist->user_id = session('info_user')[0]->id; 
        $playlist->slug = changeTitle($request->name_playlist);
        $playlist->image = config('home.register.image');
        $playlist->save();

        return redirect('/');
    }

    public function load($user_id)
    {
        $user = User::findOrFail($user_id);
        $playlist = $user->playlists()->get();

        return response()->json($playlist);
    }

    public function add(Request $request)
    {
        $playlistID = $request->playlistID;
        $musicID = $request->musicID;
        $playlist = Playlist::findOrFail($playlistID);
        $playlist->musics()->syncWithoutDetaching($musicID); 
    }
}
