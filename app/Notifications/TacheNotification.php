<?php

namespace App\Notifications;

use App\Models\Tache;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class TacheNotification extends Notification
{
    use Queueable;

    public Tache $tache;
    public $subject;

    /**
     * Create a new notification instance.
     */
    public function __construct(Tache $tache, $subject)
    {
        $this->tache = $tache;
        $this->subject = $subject;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $team = Auth::user()->currentTeam;
        $teamInfo = $team->teamInfo;

        return (new MailMessage)
            ->from($teamInfo->email, $team->name)
            ->replyTo($teamInfo->email, $team->name)
            ->subject($this->subject)
            ->cc($team->owner->email, $team->owner->name)
            ->markdown('emails.taches.created', ['tache' => $this->tache]);

        // return (new MailMessage)
        //             ->line('The introduction to the notification.')
        //             ->action('Notification Action', url('/'))
        //             ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
	        'id' => $this->tache->id,
            'parent_id' => $this->tache->parent_id,
            'user_id' => $this->tache->user_id,
            'document_id' => $this->tache->document_id,
            'statut_id' => $this->tache->statut_id,
            'priorite_id' => $this->tache->priorite_id,
            'titre' => $this->tache->titre,
            'description' => $this->tache->description,
            'date_debut' => $this->tache->date_debut,
            'date_fin' => $this->tache->date_fin,
            'team_id' => $this->tache->team_id
        ];
    }
}
