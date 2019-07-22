<?php

namespace App\Repositories\Favorite;

use App\Favorite;
use App\Music;
use App\Repositories\BaseRepository;
use Illuminate\Database\DatabaseManager;
/**
 * Class BaseRepository
 *
 * @package App\Repositories
 */
class FavoriteRepository extends BaseRepository implements FavoriteRepositoryInterface
{
    /**
     * @var Favorite
     */
    protected $model;

    /**
     * UserRepository constructor.
     *
     * @param Favorite $model
     */

    public function getModel()
    {
        return Favorite::class;
    }

    public function likeMusic($favorite)
    {
        $musics = array();
        foreach ($favorite as $item) {
            $musicID = $item->music_id;
            $music = Music::where('id', $musicID)->first();
            array_push($musics, $music);
        }

        return $musics;
    }

    public function getByUserId($id)
    {
        return $this->model->where('user_id', $id)->get();
    }
}
