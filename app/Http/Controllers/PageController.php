<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Music;
use App\Artist;
use App\Album;
use App\User;
use App\Category;
use App\Playlist;
use App\Favorite;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\HomeRegisterRequest;

class PageController extends Controller
{
    public function index()
    {
        $song = Music::orderBy('id', 'DESC')->skip(config('home.number.begin_music'))->take(config('home.number.end_music'))->get();
        $albums = Album::orderBy('id', 'DESC')->skip(config('home.number.begin_album'))->take(config('home.number.end_album'))->get();
        $artists = Artist::orderBy('id', 'DESC')->get();

        $musics = '';
        $music_like = array();
        
        foreach($song as $item){
            $single_music_like = array();
            $single_music_like[0] = $musics;
            $single_music_like[1] = false;
            if (!session('info_user')) {
                $single_music_like[0] = $item;
                $single_music_like[1] = false;
            } else {
                $user = session('info_user')[0]->id;
                $single_music_like[0] = $item;
                $like = Favorite::where('user_id', $user)
                    ->where('music_id', $item->id)
                    ->get();
                    
                if (count($like) == 0) {
                    $single_music_like[1] = false;
                } else {
                    $single_music_like[1] = true;
                }
            }
            array_push($music_like , $single_music_like);
        }
        
        return view('home', compact('music_like', 'albums', 'artists')); 
    } 

    public function artist($id)
    {
        $artist = Artist::findOrFail($id);
        if (!$artist) {
            return redirect('/');
        } else {
            return view('pages.artist', compact('artist'));
        }
    }

    public function getJsonMusic($id)
    {
        $song = Music::with('artists')->findOrFail($id);
        
        return response()->json($song);
    }

    public function getJsonAlbum($id)
    {
        $album = Album::with('artists')->findOrFail($id);
        $music = $album->musics()->get();

        return response()->json($music);
    }

    public function getCategory($id)
    {
        $category = Category::findOrFail($id);
        $music = $category->musics()->paginate(config('home.number.paginate_category'));

        return view('pages.category', compact('category', 'music'));
    }

    public function logout(){
        Auth::logout();
        session()->forget('username');
        session()->forget('info_user');
        session()->forget('name');

        return redirect('/');
    }

    public function profile($id){
        $users = User::findOrFail($id);
        $favorite = Favorite::where('user_id', $id)->get(); 
        $musics = array();
        foreach ($favorite as $item) {
            $musicID = $item->music_id;
            $music = Music::where('id', $musicID)->first();
            array_push($musics, $music);
        }

        return view('pages.profile', compact('users', 'musics'));
    }

    public function addview($id)
    {
        $musics = Music::findOrFail($id);
        $musics->view = $musics->view + 1;
        $musics->save();
    }
}
