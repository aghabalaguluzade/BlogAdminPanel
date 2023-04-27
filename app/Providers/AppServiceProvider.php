<?php

namespace App\Providers;

use App\Repositories\Contracts\AboutRepositoryInterface;
use App\Repositories\Contracts\BlogRepositoryInterface;
use App\Repositories\Contracts\ContactMeRepositoryInterface;
use App\Repositories\Contracts\GeneralRepositoryInterface;
use App\Repositories\Eloquent\AboutRepository;
use App\Repositories\Eloquent\BlogRepository;
use App\Repositories\Eloquent\GeneralRepository;
use App\Repositories\Eloquent\ContactMeRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(BlogRepositoryInterface::class, BlogRepository::class);
        $this->app->bind(GeneralRepositoryInterface::class, GeneralRepository::class);
        $this->app->bind(ContactMeRepositoryInterface::class, ContactMeRepository::class);
        $this->app->bind(AboutRepositoryInterface::class, AboutRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        app()->useLangPath(base_path('lang'));
    }
}
