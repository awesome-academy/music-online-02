<?php

namespace App\Repositories\Playlist;

use App\Playlist;
use App\Repositories\RepositoryInterface;
use Throwable;

/**
 * Interface UserRepositoryInterface
 *
 * @package App\Repositories\Playlist
 */
interface PlaylistRepositoryInterface extends RepositoryInterface
{
    public function getJsonPlaylist($id);

    public function getPlaylistByUser($id);
}
