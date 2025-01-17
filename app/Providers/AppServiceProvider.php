<?php

namespace App\Providers;

use App\Interfaces\AuthorInterface;
use App\Interfaces\BookInterface;
use App\Interfaces\ReviewInterface;
use App\Interfaces\UserInterface;
use App\Repositories\AuthorRepository;
use App\Repositories\BookRepository;
use App\Repositories\ReviewRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AuthorInterface::class, AuthorRepository::class);
        $this->app->bind(BookInterface::class, BookRepository::class);
        $this->app->bind(ReviewInterface::class, ReviewRepository::class);
        $this->app->bind(UserInterface::class, UserRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
