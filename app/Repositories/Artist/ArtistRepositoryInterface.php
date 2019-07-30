<?php

namespace App\Repositories\Artist;

use App\Artist;
use App\Repositories\RepositoryInterface;
use Throwable;

/**
 * Interface UserRepositoryInterface
 *
 * @package App\Repositories\Artist
 */
interface ArtistRepositoryInterface extends RepositoryInterface
{
	public function addImageArtist($image);

	public function updateImage($id, $name, $description, $slug, $image, $dataImage);
}
