<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Music;
use App\Category;

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
        view()->composer('lay.menu',function($view){
            $category = Category::all();
            $view->with('category',$category);
        });
        
        view()->composer('lay.footer',function($view){
            $music = Music::first();
            $path = $music->path;
            $paths = json_encode($path , true);
            //$detail = json_encode($music, true);
            $view->with('paths',$paths);
        });
    }
}
