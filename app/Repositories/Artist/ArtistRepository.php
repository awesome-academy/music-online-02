<?php

namespace App\Repositories\Artist;

use App\Artist;
use App\Music;
use App\Album;
use DB;
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

    public function deleteArtist($id)
    {
        try {
            DB::beginTransaction();
            $artist = $this->model->findOrFail($id);

            $musics = $artist->musics()->get();
            foreach ($musics as $music) {
                $song = Music::findOrFail($music->id);
                foreach ($song->categories as $category) {
                    $song->categories()->detach($song->id);
                }

                foreach ($song->albums as $relateAlbum) {
                    $song->albums()->detach($song->id);
                }
            
                $artist->musics()->detach($music->id);
                Music::where('id', $music->id)->delete();
            }// xoa music lien quan

            $albums = $artist->albums()->get();
            foreach ($albums as $album) {
                $artist->albums()->detach($album->id);
                ALbum::where('id', $album->id)->delete();
            }// xoa artist_aulbum

            $artist->delete();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        
            throw new Exception($e->getMessage());
        } 
    }

}
