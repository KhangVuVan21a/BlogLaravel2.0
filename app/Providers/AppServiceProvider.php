<?php

namespace App\Providers;

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
        $this->app->singleton(
            \App\Repositories\Blog\BlogRepositoryInterface::class,
            \App\Repositories\Blog\BlogRepository::class,
        );
        $this->app->bind(
            \App\Repositories\Blog\CategoryRepositoryInterface::class,
            \App\Repositories\Blog\CategoryRepository::class,
        );
        $this->app->bind(
            \App\Repositories\Blog\PositionRepositoryInterface::class,
            \App\Repositories\Blog\PositionRepository::class,
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
