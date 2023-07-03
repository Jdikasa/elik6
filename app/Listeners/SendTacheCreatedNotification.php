<?php

namespace App\Listeners;

use App\Events\TacheCreated;
use App\Notifications\TacheNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class SendTacheCreatedNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(TacheCreated $event): void
    {
        $users = $event->tache->executants->map(function ($agent) {
            return $agent->user;
        });
        Notification::send($users, new TacheNotification($event->tache, 'Attribution d\'une tâche - Votre nouvelle responsabilité'));
    }
}
