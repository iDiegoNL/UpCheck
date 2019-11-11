<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class MonitorOnline extends Notification
{
    use Queueable;

    private $monitor;

    /**
     * Create a new notification instance.
     *
     * @param $monitor
     */
    public function __construct($monitor)
    {
        $this->monitor = $monitor;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Monitor back online: ' . $this->monitor['name'])
            ->line('Your monitor <b>' . $this->monitor['name'] . '</b> is back online.')
            ->line("We will notify you when anything changes.")
            ->action('View monitor', route('monitors.show', $this->monitor['id']))
            ->line('Thank you for using UpCheck!');
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
