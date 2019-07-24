<?php

namespace App\Repositories\Favorite;

use App\Favorite;
use App\Repositories\RepositoryInterface;
use Throwable;

/**
 * Interface UserRepositoryInterface
 *
 * @package App\Repositories\Favorite
 */
interface FavoriteRepositoryInterface extends RepositoryInterface
{
    public function likeMusic($favorite);

    public function getByUserId($id);
}
