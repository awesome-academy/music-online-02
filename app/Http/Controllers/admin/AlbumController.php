<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Album;

use App\Artist;

use App\Music;

use Illuminate\Support\Facades\DB;

class AlbumController extends Controller
{
    public function listAlbum()
    {
        $albums = Album::orderBy('id', 'DESC')->get();

        return view('admin.album.listAlbum', compact('albums'));
    }

    public function listAlbumMusic($id)
    {
        $albums = Album::find($id);

        return view('admin.album.listAlbumMusic', compact('albums'));
    }

    public function addMusic()
    {
        $musics = Music::get();
        $albums = Album::get();

        return view('admin.album.addMusic', compact('musics', 'albums'));
    }

    public function addProcessMusic(Request $request)
    {
        $musicId = $request->music;
        $albumId = $request->album;
        $album = Album::find($albumId);
        $album->musics()->attach($musicId);

        return redirect()->route('albums');
    }

    public function addViewAlbum()
    {
        $artists = Artist::get();

        return view('admin.album.addAlbum', compact('artists'));
    }

    public function addProcessAlbum(Request $request)
    {
        $album = new Album();
        $data = $request->all();
        if ($request->hasFile('image')) { 
            $file = $request->image;
            $fileName = $file->getClientOriginalName('image');
            $path = 'image';
            $file->move($path, $fileName);
        } 
        $data['image'] = 'images/' . $fileName;
        $album = Album::create($data);

        $artists = new Artist();
        $artists = $album->artists()->attach($album->id, ['artist_id' => $request->artist]);

        return redirect()->route('albums');
    }

    public function updateViewAlbum($id)
    {
        $albums = Album::find($id);
        if ($albums == null) {
            return view ('errors.404');
        } else {
            return view('admin.album.updateAlbum', compact('albums'));
        } 
    }

    public function updateProcessAlbum(Request $request, $id)
    {
        $album = new Album();
        $name = $album->name = $request->name;
        $slug = $album->slug = $request->slug;
        if ($request->image == null) {
            $file = $album->image = $request->dataImage; //lay gia tri image cu
        } else {
            if ($request->hasFile('image')) {
                $file = $request->image;
                $fileName = $file->getClientOriginalName('image');
                $path = 'image';
                $file->move($path, $fileName);
            } 
        } 
        $updated = $album->updated_at = now(); 
        $album = Album::where('id', $id)->update([
            'name' => $name, 
            'slug' => $slug, 
            'image' => 'images/' . $fileName, 
            'updated_at' => $updated
        ]);

        return redirect()->route('albums');
    }
    
    public function deleteAlbum($id)
    {
        $album = new Album();
        $album->artists()->detach(['album_id' => $id]);
        $album->categories()->detach(['album_id' => $id]);
        Album::where('id', $id)->delete();

        return redirect()->route('albums');
    }

    public function deleteAlbumMusic($id,$albumId)
    {
        $album = Album::find($albumId);
        $album->musics()->detach($id);

        return redirect()->route('albums.music_view', $albumId);
    }
}
