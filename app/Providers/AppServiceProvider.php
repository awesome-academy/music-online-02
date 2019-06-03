<?php

namespace App\Providers;
use App\Music;
use App\Category;

use Illuminate\Support\ServiceProvider;

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
        });
    }
}
