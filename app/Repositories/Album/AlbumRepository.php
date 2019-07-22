<?php

namespace App\Repositories\Album;

use App\Album;
use App\Repositories\BaseRepository;
use Illuminate\Database\DatabaseManager;
/**
 * Class BaseRepository
 *
 * @package App\Repositories
 */
class AlbumRepository extends BaseRepository implements AlbumRepositoryInterface
{
    /**
     * @var Album
     */
    protected $model;

    /**
     * UserRepository constructor.
     *
     * @param Album $model
     */

    public function getModel()
    {
        return Album::class;
    }

    public function addMusic($musicId, $albumId)
    {
        $album = $this->model->findOrFail($albumId);
        $album->musics()->attach($musicId);
    }

    public function deleteAlbum($id)
    {
        $album = $this->model->findOrFail($id);
        $musics = $album->musics()->where('album_id', $id)->get();
        foreach ($musics as $music) { 
            $album->musics()->detach($musics->id);
        }
        $this->delete($id);
    }

    public function deleteAlbumMusic($id, $albumId)
    {
        $album = $this->findOrFail($albumId);
        $album->musics()->detach($id);
    }
    
    public function getJsonAlbum($id)
    {
        $album = Album::with('artists')->findOrFail($id);
        $music = $album->musics()->get();

        return $music;
    }

}
