<?php

namespace App\Repositories\Album;

use App\Album;
use App\Repositories\RepositoryInterface;
use Throwable;

/**
 * Interface UserRepositoryInterface
 *
 * @package App\Repositories\Album
 */
interface AlbumRepositoryInterface extends RepositoryInterface
{
    public function addMusic($MusicId, $albumId);

    public function deleteAlbum($id);

    public function deleteAlbumMusic($id, $albumId);

    public function getJsonAlbum($id);

}
