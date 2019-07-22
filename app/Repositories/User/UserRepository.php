<?php

namespace App\Repositories\User;

use App\User;
use App\Repositories\BaseRepository;
use Illuminate\Database\DatabaseManager;
use Socialite;
use App\Services\SocialAccountService;
use Illuminate\Support\Facades\Auth;
/**
 * Class BaseRepository
 *
 * @package App\Repositories
 */
class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    /**
     * @var User
     */
    protected $model;

    /**
     * UserRepository constructor.
     *
     * @param User $model
     */

    public function getModel()
    {
        return User::class;
    }

    public function logout()
    {
        Auth::logout();
        session()->forget('username');
        session()->forget('info_user');
        session()->forget('name');
    }
    
    public function getByName($name)
    {
        return $this->model->where('name', $name)->get();
    }

    public function callback($social)
    {
        $user = SocialAccountService::createOrGetUser(Socialite::driver($social)->user(), $social);
        auth()->login($user);
        $data = $this->getByName($user->name);
        session()->put('avatar', $data[0]->image);
        session()->put('user_id', $data[0]->id);
        session()->put('name', $user->name);
        session()->put('role_id', $data[0]->role_id);
        session()->put('info_user', $data);
        session()->put('username', $user->name);
    }
}
