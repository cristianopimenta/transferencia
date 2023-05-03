<?php

namespace App\Providers;

use App\Repositories\SuporteEloquenteORM;
use App\Repositories\SuporteRepositoryInterface;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            SuporteRepositoryInterface::class, 
            SuporteEloquenteORM::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
