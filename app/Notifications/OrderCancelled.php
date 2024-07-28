<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\HtmlString;

class OrderCancelled extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail']; // this says the types of notifications, here is email and database
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $first_name = $this->data['user']['first_name'];
        $last_name = $this->data['user']['last_name'];
        $ref = $this->data['ref'];
        return (new MailMessage)
            ->subject('YOUR BOOKING WAS CANCELLED')
            ->greeting('Hello '.$first_name.',')
            ->line('Your booking with reference '.$ref.' has been cancelled. Please contact us via email or use the live support feature on our website for more details')
            ->action('Visit your account', url('login'))
            ->salutation(new HtmlString("Thanks,<br>Bookyourvacay<br>www.bookyourvacay.com"));
    }
    // the above block are the details of the message that the user will get in his mail
}
