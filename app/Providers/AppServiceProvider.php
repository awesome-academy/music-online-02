<?php

namespace App\Providers;
use App\Music;
use App\Category;
use Illuminate\Support\ServiceProvider;
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
        //
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
