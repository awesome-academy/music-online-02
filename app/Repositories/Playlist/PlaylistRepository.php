<?php

namespace App\Repositories\Playlist;

use App\Playlist;
use App\Repositories\BaseRepository;
use Illuminate\Database\DatabaseManager;
/**
 * Class BaseRepository
 *
 * @package App\Repositories
 */
class PlaylistRepository extends BaseRepository implements PlaylistRepositoryInterface
{
    /**
     * @var Playlist
     */
    protected $model;

    /**
     * UserRepository constructor.
     *
     * @param Playlist $model
     */

    public function getModel()
    {
        return Playlist::class;
    }

    public function getJsonPlaylist($id)
    {
        $playlist = $this->model->findOrFail($id);
        $music = $playlist->musics()->get();
        
        return $music;
    }

    public function getPlaylistByUser($id)
    {
        return $this->model->where('user_id', $id)->get();
    }
}
