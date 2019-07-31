<?php

namespace App\Repositories\Artist;

use App\Artist;
use App\Repositories\BaseRepository;
use Illuminate\Database\DatabaseManager;
/**
 * Class BaseRepository
 *
 * @package App\Repositories
 */
class ArtistRepository extends BaseRepository implements ArtistRepositoryInterface
{
    /**
     * @var Artist
     */
    protected $model;

    /**
     * UserRepository constructor.
     *
     * @param Artist $model
     */

    public function getModel()
    {
        return Artist::class;
    }

    public function addImageArtist($image)
    {
        if ($image != '') { 
            $file = $image;
            $fileName = $file->getClientOriginalName('image');
            $path = 'images';
            $file->move($path, $fileName);
        }

        return $fileName;
    }

    public function updateImage($id, $name, $description, $slug, $image, $dataImage)
    {
        if ($image == null) {
            $fileName = $dataImage; //lay gia tri image cu
            Artist::where('id', $id)->update([
            'name' => $name, 
            'description' => $description, 
            'slug' => $slug, 
            'image' => $fileName,
        ]);
        } else {  
                $file = $image;
                $fileName = $file->getClientOriginalName('image');
                $path = 'images';
                $file->move($path, $fileName);
            Artist::where('id', $id)->update([
                'name' => $name, 
                'description' => $description, 
                'slug' => $slug,
                'image' => config('home.image.image') . $fileName,
            ]);
           
        }
    }

}
