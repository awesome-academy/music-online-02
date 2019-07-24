<?php

namespace App\Repositories\Music;

use App\Music;
use App\Repositories\RepositoryInterface;
use Throwable;

/**
 * Interface UserRepositoryInterface
 *
 * @package App\Repositories\Music
 */
interface MusicRepositoryInterface extends RepositoryInterface
{
    public function musicArtist($id);
    
    public function addView($id);
}
