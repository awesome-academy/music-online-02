<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Repositories\Album\AlbumRepositoryInterface;

use App\Repositories\Music\MusicRepositoryInterface;

use App\Repositories\Artist\ArtistRepositoryInterface;

use Illuminate\Support\Facades\DB;

use App\Album;

use App\Artist;
class AlbumController extends Controller
{
    private $albumRepository;

    public function __construct(AlbumRepositoryInterface $albumRepository, MusicRepositoryInterface $musicRepository, ArtistRepositoryInterface $artistRepository)
    {
        $this->albumRepository = $albumRepository;
        $this->musicRepository = $musicRepository;
        $this->artistRepository = $artistRepository;
    }

    public function listAlbum()
    {
        $albums = $this->albumRepository->getAll();

        return view('admin.album.listAlbum', compact('albums'));
    }

    public function listAlbumMusic($id)
    {
        $albums = $this->albumRepository->findOrFail($id);

        return view('admin.album.listAlbumMusic', compact('albums'));
    }

    public function addMusic()
    {
        $musics = $this->musicRepository->getAll();
        $albums = $this->albumRepository->getAll();

        return view('admin.album.addMusic', compact('musics', 'albums'));
    }

    public function addProcessMusic(Request $request)
    {
        $musicId = $request->music;
        $albumId = $request->album;
        $this->albumRepository->addMusic($musicId, $albumId);

        return redirect()->route('albums');
    }

    public function addViewAlbum()
    {
        $artists = $this->artistRepository->getAll();

        return view('admin.album.addAlbum', compact('artists'));
    }

    public function addProcessAlbum(Request $request)
    {
        $album = new Album();
        $data = $request->all();
        if ($request->hasFile('image')) { 
            $file = $request->image;
            $fileName = $file->getClientOriginalName('image');
            $path = 'images';
            $file->move($path, $fileName);
        }
        $data['image'] = config('home.image.image') . $fileName; 
        $album = $this->albumRepository->create($data);

        $artists = new Artist();
        $artists = $album->artists()->attach($album->id, ['artist_id' => $request->artist]);

        return redirect()->route('albums');
    }

    public function updateViewAlbum($id)
    {
        $albums = $this->albumRepository->findOrFail($id);

        return view('admin.album.updateAlbum', compact('albums'));
    }

    public function updateProcessAlbum(Request $request, $id)
    {
        $album = new Album();
        $name = $album->name = $request->name;
        $slug = $album->slug = $request->slug;
        if ($request->image == null) {
            $fileName = $album->image = $request->dataImage; //lay gia tri image cu
            $updated = $album->updated_at = now(); 
            $album = Album::where('id', $id)->update([
            'name' => $name, 
            'slug' => $slug, 
            'image' => $fileName, 
            'updated_at' => $updated
        ]);
        } else {
            if ($request->hasFile('image')) {
                $file = $request->image;
                $fileName = $file->getClientOriginalName('image');
                $path = 'images';
                $file->move($path, $fileName);
            }
            $updated = $album->updated_at = now();
            $album = Album::where('id', $id)->update([
            'name' => $name, 
            'slug' => $slug, 
            'image' =>  config('home.image.image') . $fileName, 
            'updated_at' => $updated,
        ]); 
        } 
        
        return redirect()->route('albums');
    }
    
    public function deleteAlbum($id)
    {
        $this->albumRepository->deleteAlbum($id);

        return redirect()->route('albums');
    }

    public function deleteAlbumMusic($id, $albumId)
    {
        $this->albumRepository->deleteAlbumMusic($id, $albumId);

        return redirect()->route('albums.music_view', $albumId);
    }
}
