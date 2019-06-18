<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Music;
use App\Artist;
use App\Album;
use App\User;
use App\Category;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\HomeRegisterRequest;
use App\Playlist;
use Illuminate\Support\Facades\Hash;

class PageController extends Controller
{
    public function index()
    {
        $musics = Music::orderBy('id', 'DESC')->skip(config('home.number.begin_music'))->take(config('home.number.end_music'))->get();
        $albums = Album::orderBy('id', 'DESC')->skip(config('home.number.begin_album'))->take(config('home.number.end_album'))->get();
        $artists = Artist::orderBy('id', 'DESC')->get();
        
        return view('home', compact('musics', 'albums', 'artists')); 
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

    public function getJsonPlaylist($id)
    {
        $playlist = Playlist::with('artists')->findOrFail($id);
        $music = $playlist->musics()->get();

        return response()->json($playlist);
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
        $playlist = Playlist::where('user_id', '=', $id)->get();

        return view('pages.profile', compact('users', 'playlist'));
    }

    public function playlist($id){
        $playlist = Playlist::findOrFail($id);
        if (!$playlist) {
            return redirect('/');
        } else {
            $music = $playlist->musics()->get();

            return view('playlist.playlist', compact('music', 'playlist'));
        }
    } 
}
