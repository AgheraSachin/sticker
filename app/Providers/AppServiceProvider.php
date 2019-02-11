<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repository\Interfaces\categoryInterface','App\Repository\Classes\categoryRepo');
        $this->app->bind('App\Repository\Interfaces\trayIconInterface','App\Repository\Classes\trayIconRepo');
        $this->app->bind('App\Repository\Interfaces\stickerInterface','App\Repository\Classes\stickerRepo');
        $this->app->bind('App\Repository\Interfaces\trendingInterface','App\Repository\Classes\trendingRepo');
    }
}
