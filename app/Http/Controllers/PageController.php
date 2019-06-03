<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Music;
use App\Artist;
use App\Album;
use App\User;
use App\Category;
use App\Http\Requests\HomeRegisterRequest;

class PageController extends Controller
{
    public function index()
    {
        $musics = Music::orderBy('id', 'DESC')->skip(config('home.number.begin_music'))->take(config('home.number.end_music'))->get();
        $albums = Album::orderBy('id', 'DESC')->skip(config('home.number.begin_album'))->take(config('home.number.end_album'))->get();
        $artists = Artist::orderBy('id', 'DESC')->get();
        
        return view('home', compact('musics', 'albums', 'artists')); 
    } 
}
