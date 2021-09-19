<?php

namespace App\Providers;

use App\Services\Integration\IntegrationManager;
use App\Services\Integration\IntegrationManagerInterface;
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
        $this->app->bind(IntegrationManagerInterface::class, IntegrationManager::class);
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

    public function provides()
    {
        return [
            IntegrationManagerInterface::class,
        ];
    }
}
