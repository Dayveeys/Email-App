<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\HtmlString;

class PaymentConfirmed extends Notification
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
        $amount = $this->data['amount'];
        return (new MailMessage)
            ->subject('O PAGAMENTO DO PEDIDO FOI CONFIRMADO')
            ->greeting('Olá, '.$first_name.' '.$last_name)
            ->line('Parabéns! o seu pagamento de '.$amount.'Kz para encomenda com a referência '.$ref.' foi confirmado, por favor, seja paciente enquanto seu pedido está sendo processado para envio. Você pode nos contatar aqui https://casajapaointernacional.com/contact para mais detalhes, você pode acompanhar seu pedido clicando no botão abaixo')
            ->action('Acompanhe seus pedidos', url('orders'))
            ->salutation(new HtmlString("Obrigado,<br>Casa Japao Intenacional<br>www.casajapaointernacional.com"));;
    }
    // the above block are the details of the message that the user will get in his mail
}
