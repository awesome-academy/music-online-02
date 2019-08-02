<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Music;

use App\Artist;

use App\Category;

use App\Favorite;

use App\Repositories\Music\MusicRepositoryInterface;

use App\Repositories\Album\AlbumRepositoryInterface;

use App\Repositories\Artist\ArtistRepositoryInterface;

use App\Repositories\Category\CategoryRepositoryInterface;

use Illuminate\Support\Facades\DB;

class MusicController extends Controller
{
    private $albumRepository;

    public function __construct(AlbumRepositoryInterface $albumRepository, MusicRepositoryInterface $musicRepository, ArtistRepositoryInterface $artistRepository, CategoryRepositoryInterface $categoryRepository)
    {
        $this->albumRepository = $albumRepository;
        $this->musicRepository = $musicRepository;
        $this->artistRepository = $artistRepository;
        $this->categoryRepository = $categoryRepository;
    }
    public function listMusic()
    {
    	$music = $this->musicRepository->getAll();

    	return view('admin.music.listMusic', compact('music'));
    }

    public function addViewMusic()
    {
    	$artist = $this->artistRepository->getAll();
    	$category = $this->categoryRepository->getAll();

    	return view('admin.music.addMusic', compact('artist', 'category'));
    }

    public function addProcessMusic(Request $request)
    {
    	try {
          	DB::beginTransaction();
          	$music = new Music();
            $data = $request->all();
    		if ($request->hasFile('image')) {
    			$file = $request->image;
    			$fileName = $file->getClientOriginalName('image');
    			$path = 'images';
    			$file->move($path, $fileName);
    		} 
            $data['image'] = 'images/' . $fileName;
            $music = Music::create($data);

            $artist = new Artist();
            $artist = $music->artists()->attach($music->id, ['artist_id' => $request->artist]); /// them vao bang artist trung gian

            $category = new Category();
            $category = $music->categories()->attach($music->id, ['category_id' => $request->category]);/// them vao bang category trung gian
            DB::commit();
    	} catch (Exception $e) {
        DB::rollBack();
        
        throw new Exception($e->getMessage());
    	} 

    	return redirect()->route('musics');
    }

    public function updateViewMusic($id)
    {
    	$musics = $this->musicRepository->findOrFail($id);
        
        return view('admin.music.updateMusic', compact('musics'));
    }

    public function updateProcessMusic(Request $request, $id)
    {
    	$music = new Music();
    	$name = $music->name = $request->nameMusic;
    	$lyric = $music->lyric = $request->lyric;
    	$path = $music->path = $request->path;
    	$author = $music->author = $request->author;
    	$slug = $music->slug = $request->slug;
    	if ($request->image == null) {
    		$fileName = $music->image = $request->dataImage;
            $music = Music::where('id', $id)->update([
                'name' => $name, 
                'lyric' => $lyric, 
                'path' => $path, 
                'author' => $author, 
                'slug' => $slug, 
                'image' => $fileName, 
            ]);
    	} else {
    		if($request->hasFile('image')){
                $file = $request->image;
                $fileName = $file->getClientOriginalName('image');
                $paths = 'images';
                $file->move($paths, $fileName);
            }
            $music = Music::where('id', $id)->update([
                'name' => $name, 
                'lyric' => $lyric, 
                'path' => $path, 
                'author' => $author, 
                'slug' => $slug, 
                'image' => 'images/' . $fileName, 
            ]);
    	} 

    	return redirect()->route('musics');
    }
    
    public function deleteMusic($id)
    {
        $muiscId = Music::find($id);
        if($muiscId == null) {
            return redirect()->route('musics')->with('err', '');
        } else {
            $music = Music::findOrFail($id);
            $artists = $music->artists()->get();
            $categories = $music->categories()->get();
            $music->artists()->detach($artists[0]->id);
            $music->categories()->detach($categories[0]->id);
            Favorite::where('music_id', $id)->delete();
            Music::where('id', $id)->delete();
            
            return redirect()->route('musics')->with('success', '');
        }
    }
}
