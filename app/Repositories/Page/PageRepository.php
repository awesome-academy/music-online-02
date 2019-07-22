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
        
    }
}
