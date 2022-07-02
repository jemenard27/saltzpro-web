<?php

namespace App\Providers;

use App\Repositories\BetRepository;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\BetRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(BetRepositoryInterface::class, BetRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
