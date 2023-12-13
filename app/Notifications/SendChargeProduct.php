<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendChargeProduct extends Notification
{
    use Queueable;
    private $name;
    private  $product;
    /**
     * Create a new notification instance.
     */
    public function __construct($name,$product)
    {
        $this->name=$name;
        $this->product=$product;


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
        return (new MailMessage)->markdown(
            'emails.charge', ['user' => $this->name,'product'=>$this->product]
        )->subject('طلب شحن');

    }
    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'type'=>'شحن',
            'name'=>$this->name,
            'product'=>" $this->product",
            'message'=> 'لقد تم الشحن بنجاح'
        ];
    }
}
