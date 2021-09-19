<?php

namespace App\Providers;

use App\Repositories\Feed\FeedRepository;
use App\Repositories\Feed\FeedRepositoryInterface;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterface;
use App\Services\Auth\AuthService;
use App\Services\Auth\AuthServiceInterface;
use App\Services\Feed\FeedService;
use App\Services\Feed\FeedServiceInterface;
use App\Services\User\UserService;
use App\Services\User\UserServiceInterface;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class ServiceContainerProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->repositoryBindings();

        $this->serviceBindings();
    }

    /**
     * Repository bindings
     */
    protected function repositoryBindings(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(FeedRepositoryInterface::class, FeedRepository::class);
        //...
    }

    /**
     * Service bindings
     */
    protected function serviceBindings(): void
    {
        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(AuthServiceInterface::class, AuthService::class);
        $this->app->bind(FeedServiceInterface::class, FeedService::class);
        //...
    }

    /**
     * @inheritDoc
     */
    public function provides()
    {
        return [
            UserRepositoryInterface::class,
            FeedRepositoryInterface::class,

            //Services...
            UserServiceInterface::class,
            AuthServiceInterface::class,
            FeedServiceInterface::class,

        ];
    }
}
