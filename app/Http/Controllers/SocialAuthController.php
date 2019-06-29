<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Services\SocialAccountService;
use App\Repositories\User\UserRepositoryInterface;
use Socialite;
use App\User;

class SocialAuthController extends Controller
{
    private $albumRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    
    public function redirect($social)
    {
        return Socialite::driver($social)->redirect();
    }

    public function callback($social)
    {
        $this->userRepository->callBack($social);

        return redirect()->route('home');
    }
}
