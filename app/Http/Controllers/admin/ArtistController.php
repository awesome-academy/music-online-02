<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Artist;

class ArtistController extends Controller
{
     public function listArtist()
    {
        $artists = Artist::orderBy('id', 'ASC')->get();

        return view('admin.artist.listArtist', compact('artists'));
    }

    public function addViewArtist()
    {
        return view('admin.artist.addArtist');
    }

    public function addProcessArtist(Request $request)
    {
        $artists = new Artist();
        $artists->name = $request->nameArtist;
        $artists->description = $request->description;
        $artists->slug = $request->slug;
        if ($request->hasFile('image')) { 
            $file = $request->image;
            $fileName = $file->getClientOriginalName('image');
            $path = 'images';
            $file->move($path, $fileName);
        }
        $artists->image = Artist::loimage($fileName);
        $artists->save();

        return redirect()->route('artists');
    }

    public function updateViewArtist($id)
    {
        $artists = Artist::find($id);
        if ($artists == null) {
            return view('errors.404');
        } else {
            return view('admin.artist.updateArtist', compact('artists'));
        }
    }

    public function updateProcessArtist(Request $request, $id)
    {
        $artists = new Artist();
        $name = $artists->name = $request->nameArtist;  
        $description = $artists->description = $request->description;
        $slug = $artists->slug = $request->slug;
        if ($request->image == null) {
            $fileName = $artists->image = $request->dataImage; //lay gia tri image cu
             $artists = Artist::where('id', $id)->update([
            'name' => $name, 
            'description' => $description, 
            'slug' => $slug, 
            'image' => $fileName,
        ]);
        } else {
            if ($request->hasFile('image')) {
                $file = $request->image;
                $fileName = $file->getClientOriginalName('image');
                $path = 'images';
                $file->move($path, $fileName);
            }
            $image = Artist::loimage($fileName); // config duong dan anh voi scope
            Artist::where('id', $id)->update([
                'name' => $name, 
                'description' => $description, 
                'slug' => $slug,
                'image' => $image,
            ]);
           
        }
        
        return redirect()->route('artists');
    }
    
    public function deleteArtist($id)
    {
        Artist::where('id', $id)->delete();

        return redirect()->route('artists');
    }
}
