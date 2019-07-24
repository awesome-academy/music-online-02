<?php

namespace App\Providers;
use App\Music;
use App\Category;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Album\AlbumRepositoryInterface;
use App\Repositories\Album\AlbumRepository;
use App\Repositories\Music\MusicRepositoryInterface;
use App\Repositories\Music\MusicRepository;
use App\Repositories\Artist\ArtistRepositoryInterface;
use App\Repositories\Artist\ArtistRepository;
use App\Repositories\Playlist\PlaylistRepositoryInterface;
use App\Repositories\Playlist\PlaylistRepository;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\User\UserRepository;
use App\Repositories\Favorite\FavoriteRepositoryInterface;
use App\Repositories\Favorite\FavoriteRepository;
use App\Playlist;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(AlbumRepositoryInterface::class, AlbumRepository::class);
        $this->app->singleton(MusicRepositoryInterface::class, MusicRepository::class);
        $this->app->singleton(ArtistRepositoryInterface::class, ArtistRepository::class);
        $this->app->singleton(PlaylistRepositoryInterface::class, PlaylistRepository::class);
        $this->app->singleton(UserRepositoryInterface::class, UserRepository::class);
        $this->app->singleton(FavoriteRepositoryInterface::class, FavoriteRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('lay.menu', function($view){
            $category = Category::all();
            $view->with('category', $category);
            $playlist = '';
            if (session('info_user') != null) {
                $userId = session('info_user')[0]->id;
                $playlist = Playlist::where('user_id', '=' , $userId)->orWhereNull('user_id')->get();
            }
            $view->with('playlist', $playlist);
        });
    }
}
