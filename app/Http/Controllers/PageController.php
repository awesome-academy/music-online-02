<?php

namespace App\Http\Controllers;
use App\Music;
use App\Album;
use App\Artist;
use App\Category;
use App\Comment;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $musics = Music::orderBy('id', 'DESC')->skip(config('home.number.begin_music'))->take(config('home.number.end_music'))->get();
        $albums = Album::orderBy('id', 'DESC')->skip(config('home.number.begin_album'))->take(config('home.number.end_album'))->get();
        $artists = Artist::orderBy('id','DESC')->get();
        
        return view('home',compact('musics', 'albums', 'artists')); 
    } 

    public function music($id, $slug){
        $musics = Music::findOrFail($id);
        $songs = Music::orderBy('id', 'DESC')->skip(config('home.number.begin_music'))->take(config('home.number.end_song'))->get();
        $comments = $musics->comments()->orderBy('id', 'DESC')->get();
        $artists = $musics->artists()->get();
     
        return view('pages.music', compact('musics', 'songs', 'comments', 'artists'));
    }
}
