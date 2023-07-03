<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Listeners\SendFactureCreatedNotification;
use App\Listeners\SendCotationCreatedNotification;
use App\Listeners\SendProjectCreatedNotification;
use App\Listeners\SendTacheCreatedNotification;
use App\Events\FactureCreated;
use App\Events\CotationCreated;
use App\Events\ProjectCreated;
use App\Events\TacheCreated;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        FactureCreated::class => [
            SendFactureCreatedNotification::class
        ],
        CotationCreated::class => [
            SendCotationCreatedNotification::class
        ],
        ProjectCreated::class => [
            SendProjectCreatedNotification::class
        ],
        TacheCreated::class => [
            SendTacheCreatedNotification::class
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
