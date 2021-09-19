<?php

namespace App\Providers;

use App\Events\User\UserCreated;
use App\Listeners\User\SendEmailVerificationCode;
use App\Listeners\User\SendPhoneVerificationCode;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        UserCreated::class => [
            SendEmailVerificationCode::class,
            SendPhoneVerificationCode::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
