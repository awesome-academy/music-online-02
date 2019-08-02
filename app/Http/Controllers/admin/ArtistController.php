<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Repositories\Artist\ArtistRepositoryInterface;

use App\Artist;

class ArtistController extends Controller
{
    private $artistRepository;

    public function __construct(ArtistRepositoryInterface $artistRepository)
    {
        $this->artistRepository = $artistRepository;
    }

    public function listArtist()
    {
        $artists = $this->artistRepository->getAll();

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
        $image = $request->image;
        $fileName = $this->artistRepository->addImageArtist($image);
        $artists->image = config('home.image.image') . $fileName; 
        $artists->save();

        return redirect()->route('artists');
    }

    public function updateViewArtist($id)
    {
        $artists = $this->artistRepository->findOrFail($id);

        return view('admin.artist.updateArtist', compact('artists'));
    }

    public function updateProcessArtist(Request $request, $id)
    {
        $artists = new Artist();
        $name = $artists->name = $request->nameArtist;  
        $description = $artists->description = $request->description;
        $slug = $artists->slug = $request->slug;
        $image = $request->image;
        $dataImage = $request->dataImage;
        $this->artistRepository->updateImage($id, $name, $description, $slug, $image, $dataImage);
        
        return redirect()->route('artists');
    }
    
    public function deleteArtist($id)
    {
        $artist = $this->artistRepository->find($id);
        if ($artist == null) {
            return redirect()->route('artists')->with('err', '');
        } else {
            $this->artistRepository->deleteArtist($id);

            return redirect()->route('artists')->with('success', '');
        }
    }
}
