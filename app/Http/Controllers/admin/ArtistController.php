<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Artist;

class ArtistController extends Controller
{
     public function listArtist()
    {
        $aritsts = Artist::orderBy('id', 'ASC')->get();


        return view('admin.artist.listArtist', compact('aritsts'));
    }

    public function addViewArtist()
    {
        return view('admin.artist.addArtist');
    }

    public function addProcessArtist(Request $request)
    {
        $aritsts  =  new Artist();
        $aritsts->name  = $request->nameArtist;
        $aritsts->description  = $request->description;
        $aritsts->slug = $request->slug;
        $aritsts->image = $request->image;
        $aritsts->save();

        return redirect()->route('artists');
    }

    public function updateViewArtist($id)
    {
        $artists = Artist::find($id);

        return view('admin.artist.updateArtist', compact('artists'));
    }

    public function updateProcessArtist(Request $request, $id)
    {
        $aritsts  =  new Artist();
        $name = $aritsts->name = $request->nameArtist;  
        $description = $aritsts->description = $request->description;
        $slug = $aritsts->slug = $request->slug;
        if ($request->image =  = '') {
            $image = $aritsts->image = $request->dataImage; 
        } else {
            $image = $aritsts->image = $request->image; 
        }
        $aritsts = Artist::where('id', $id)->update([
            'name' => $name, 
            'description' => $description, 
            'slug' => $slug, 
            'image' => $image
        ]);

        return redirect()->route('artists');
    }
    
    public function deleteArtist($id)
    {
        Artist::where('id', $id)->delete();

        return redirect()->route('artists');
    }
}
