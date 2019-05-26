<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Artist;

class ArtistController extends Controller
{
    public function listArtist()
    {
    	$artist=Artist::orderBy('id','ASC')->get();


    	return view('admin.artist.listArtist',compact('artist'));
    }

    public function addViewArtist()
    {
    	return view('admin.artist.addArtist');
    }

    public function addProcessArtist(Request $request)
    {
    	$artist = new Artist();
    	$artist->name = $request->nameArtist;
    	$artist->description = $request->description;
    	$artist->slug = $request->slug;
    	$artist->image = $request->image;
    	$artist->save();

    	return redirect()->route('artists');
    }

    public function updateViewArtist($id)
    {
    	$artists=Artist::find($id);

    	return view('admin.artist.updateArtist',compact('artists'));
    }

    public function updateProcessArtist(Request $request,$id)
    {
    	$artist = new Artist();
    	$name = $artist->name = $request->nameArtist;	
    	$description = $artist->description = $request->description;
    	$slug = $artist->slug=$request->slug;
    	if ($request->image == '') {
    		$image = $artist->image = $request->dataImage;	
    	}
    	else
    	{
    		$image = $artist->image = $request->image;	
    	}
    	$artist = Artist::where('id',$id)->update([
    		'name' => $name,
    		'description' => $description,
    		'slug' => $slug,
    		'image' => $image
    	]);

    	return redirect()->route('artists');
    }
    
    public function deleteArtist($id)
    {
    	Artist::where('id',$id)->delete();

    	return redirect()->route('artists');
    }
}
