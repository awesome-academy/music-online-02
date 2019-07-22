<?php

namespace App\Repositories\User;

use App\User;
use App\Repositories\RepositoryInterface;
use Throwable;

/**
 * Interface UserRepositoryInterface
 *
 * @package App\Repositories\User
 */
interface UserRepositoryInterface extends RepositoryInterface
{
    public function logout();
}
