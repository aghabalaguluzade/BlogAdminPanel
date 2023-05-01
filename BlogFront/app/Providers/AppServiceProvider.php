<?php

namespace App\Providers;

use App\Repositories\Contracts\BlogRepositoryInterface;
use App\Repositories\Eloquent\BlogRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind(BlogRepositoryInterface::class, BlogRepository::class);
    }
}
