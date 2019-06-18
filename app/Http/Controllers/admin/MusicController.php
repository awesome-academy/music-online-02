<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Music;

use App\Artist;

use App\Category;

use Illuminate\Support\Facades\DB;

class MusicController extends Controller
{
    public function listMusic()
    {
    	$music = Music::orderBy('id', 'ASC')->get();

    	return view('admin.music.listMusic', compact('music'));
    }

    public function addViewMusic()
    {
    	$artist = Artist::get();
    	$category = Category::get();

    	return view('admin.music.addMusic', compact('artist', 'category'));
    }

    public function addProcessMusic(Request $request)
    {
    	try {
          	DB::beginTransaction();
			$music = new Music();
			$data = $request->all();
			$data['slug'] = changeTitle($request->name);
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
    	$musics = Music::find($id);
        if ($musics == null) {
            return view ('errors.404');
        } else {
            return view('admin.music.updateMusic', compact('musics'));
        } 
    }

    public function updateProcessMusic(Request $request, $id)
    {
    	$music = new Music();
    	$name = $music->name = $request->name;
    	$lyric = $music->lyric = $request->lyric;
    	$path = $music->path = $request->path;
    	$author = $music->author = $request->author;
    	$slug = $music->slug = changeTitle($request->name);
    	if ($request->image == '') {
    		$fileName = $music->image = $request->dataImage;
    	} else {
    		if($request->hasFile('image')){
                $file = $request->image;
                $fileName = $file->getClientOriginalName('image');
                $path = 'images';
                $file->move($path, $fileName);
            } 
    	} 
    	$music = Music::where('id', $id)->update([
    		'name' => $name, 
        	'lyric' => $lyric, 
        	'path' => $path, 
        	'author' => $author, 
        	'slug' => $slug, 
        	'image' => 'images/' . $fileName, 
    	]);

    	return redirect()->route('musics');
    }
    
    public function deleteMusic($id)
    {
    	$music = new Music();
    	$music->artists()->detach(['music_id' => $id]);
    	$music->categories()->detach(['music_id' => $id]);
    	Music::where('id', $id)->delete();

    	return redirect()->route('musics');
    }
}
