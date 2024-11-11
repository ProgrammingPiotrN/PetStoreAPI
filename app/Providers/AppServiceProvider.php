<?php

namespace App\Providers;

use App\Repositories\PetRepository;
use App\Repositories\PetRepositoryInterface;
use App\Services\PetService;
use App\Services\PetServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PetServiceInterface::class, PetService::class);
        $this->app->bind(PetRepositoryInterface::class, PetRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
