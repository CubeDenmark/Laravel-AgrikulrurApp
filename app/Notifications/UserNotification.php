<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserNotification extends Notification implements ShouldBroadcast
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $auction_id;
    public $creator_id;
    public $bidder_id;

    public $phase;
    public function __construct($auction_id, $creator_id, $bidder_id, $phase)
    {
        $this->auction_id = $auction_id;
        $this->creator_id = $creator_id;
        $this->bidder_id = $bidder_id;
        $this->phase = $phase;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database', 'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */

     /*
    public function toArray(object $notifiable): array
    {
        return [
            'auction_id' => $this->auction_id,
            'creator_id' => $this->creator_id,
            'bidder_id' => $this->bidder_id,
            'phase' => $this->phase,
        ];
    }
    */
    public function toBroadcast($notifiable): array
{
    return [
        'data' => [
            'auction_id' => $this->auction_id,
            'creator_id' => $this->creator_id,
            'bidder_id' => $this->bidder_id,
            'phase' => $this->phase,
        ],
        'message' => "$this->auction_id (Message for $notifiable->name)",
    ];
}

    public function toDatabase($notifiable)
    {
        return [
            'auction_id' => $this->auction_id,
            'creator_id' => $this->creator_id,
            'bidder_id' => $this->bidder_id,
            'phase' => $this->phase,
        ];
    }
}
