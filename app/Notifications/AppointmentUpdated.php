<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AppointmentUpdated extends Notification implements ShouldQueue
{
    use Queueable;
    private $date ;
    private $doctorName;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($name, $date)
    {
        $this->date = $date ;
        $this->doctorName = $name;
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
        return (new MailMessage)
                    ->line('your appointment is updated ')
                    ->action('Show', url('/appointments'))
                    ->line(" {$this->doctorName} on {$this->date}")
                    ->line("thank you");
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
