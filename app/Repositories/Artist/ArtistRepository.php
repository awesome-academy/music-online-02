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

}
