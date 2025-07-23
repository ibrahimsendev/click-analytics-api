<?php

namespace App\Providers;

use App\Interfaces\Repositories\ClickRepositoryInterface;
use App\Interfaces\Services\ClickServiceInterface;
use App\Repositories\ClickRepository;
use App\Services\ClickService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ClickRepositoryInterface::class, ClickRepository::class);
        $this->app->bind(ClickServiceInterface::class, ClickService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
