<?php

namespace App\Notifications;

use App\User;
use App\Guest;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class WeddingInvite extends Notification
{
    use Queueable;

    private $couple;
    private $guest;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Guest $guest)
    {
        //$this->couple = $couple;
        $this->guest = $guest;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        /*return (new MailMessage)
            ->subject('You are cordially invited to...')
            ->from('admin@dianne.com', 'DIANNE Admin')
            ->line('Hello, ' . $this->guest->first_name . '.')
            //->line("You are cordially invited to the wedding of " . $this->couple->bride_first_name . " " . $this->couple->bride_last_name
            //    . " & " . $this->couple->groom_first_name . " " . $this->couple->groom_last_name . "'s Wedding on ". $this->couple->wedding_date)
            ->action('Respond', url('#'));*/

        $guest = $this->guest;

        return (new MailMessage)
            ->view('emails.invitation', ['guest' => $guest]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
