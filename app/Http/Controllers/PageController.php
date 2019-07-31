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
use App\Top;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\HomeRegisterRequest;
use App\Repositories\Music\MusicRepositoryInterface;
use App\Repositories\Album\AlbumRepositoryInterface;
use App\Repositories\Artist\ArtistRepositoryInterface;
use App\Repositories\Playlist\PlaylistRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Favorite\FavoriteRepositoryInterface;
use Illuminate\Support\Facades\Redis;
use Cache;
use DB;

class PageController extends Controller
{
    private $albumRepository;

    public function __construct(AlbumRepositoryInterface $albumRepository, MusicRepositoryInterface $musicRepository, ArtistRepositoryInterface $artistRepository, PlaylistRepositoryInterface $playlistRepository, UserRepositoryInterface $userRepository, FavoriteRepositoryInterface $favoriteRepository)
    {
        $this->albumRepository = $albumRepository;
        $this->musicRepository = $musicRepository;
        $this->artistRepository = $artistRepository;
        $this->playlistRepository = $playlistRepository;
        $this->userRepository = $userRepository;
        $this->favoriteRepository = $favoriteRepository;
    }

    public function index()
    {
        $expire = config('home.expire');
        DB::connection()->enableQueryLog();
        $song = Cache::remember('song', $expire, function(){
            return $this->musicRepository->skipTake();
        });
        $albums = Cache::remember('album', $expire, function(){
            return $this->albumRepository->skipTake();
        });
        $artists = Cache::remember('artist', $expire, function(){
            return $this->artistRepository->getAll();
        });

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
        $week = Top::OrderBy('week_id', 'DESC')->limit(config('home.number.first'))->get('week_id');
        $new_week = $week[0]->week_id;
        $top = Top::where('week_id', $new_week)->get();

        return view('home', compact('music_like', 'albums', 'artists', 'top')); 
        
    } 

    public function artist($id)
    {
        $artist = $this->artistRepository->findOrFail($id);

        return view('pages.artist', compact('artist'));
    }

    public function getJsonMusic($id)
    {
        $song = $this->musicRepository->musicArtist($id);
        
        return response()->json($song);
    }

    public function getJsonAlbum($id)
    {
        $music = $this->albumRepository->jsonAlbum($id);

        return response()->json($music);
    }

    public function getJsonPlaylist($id)
    {
        $music = $this->playlistRepository->getJsonPlaylist($id);

        return response()->json($music);
    }

    public function getCategory($id)
    {
        $category = Category::findOrFail($id);
        $music = $category->musics()->paginate(config('home.number.paginate_category'));

        return view('pages.category', compact('category', 'music'));
    }

    public function logout(){
        $this->userRepository->logout();

        return redirect('/');
    }

    public function profile($id){
        $users = $this->userRepository->findOrFail($id);
        $favorite = $this->favoriteRepository->getByUserId($id);
        $musics = $this->favoriteRepository->likeMusic($favorite);
        $playlists = $this->playlistRepository->getPlaylistByUser($id);

        return view('pages.profile', compact('users', 'musics', 'playlists'));
    }

    public function playlist($id){
        $playlist = Playlist::findOrFail($id);
        $song = $playlist->musics()->orderBy('id','DESC');

        return view('pages.playlist', compact('playlist', 'song'));
    }

    public function addview($id)
    {
        $this->musicRepository->addview($id);
    }
}
