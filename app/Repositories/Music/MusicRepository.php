<?php

namespace App\Repositories\Music;

use App\Music;
use App\Repositories\BaseRepository;
use Illuminate\Database\DatabaseManager;
/**
 * Class BaseRepository
 *
 * @package App\Repositories
 */
class MusicRepository extends BaseRepository implements MusicRepositoryInterface
{
    /**
     * @var Music
     */
    protected $model;

    /**
     * UserRepository constructor.
     *
     * @param Music $model
     */

    public function getModel()
    {
        return Music::class;
    }

    public function musicArtist($id)
    {
        return $this->model->with('artists')->findOrFail($id);
    }

    public function addView($id)
    {
        $musics = Music::findOrFail($id);
        $musics->view = $musics->view + 1;
        $musics->save();
    }
}
