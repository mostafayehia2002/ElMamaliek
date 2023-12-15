<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendCodeProduct extends Notification
{
    use Queueable;
    private $name;
    private  $product;
    private $code;
    /**
     * Create a new notification instance.
     */
    public function __construct($name,$product,$code)
    {
        //
        $this->name=$name;
        $this->product=$product;
        $this->code=$code;
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
            'emails.sendcode', ['user' => $this->name,'product'=>$this->product,'code'=>$this->code]
                )->subject('طلب شراء');
    }
    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'type'=>'شراء',
            'name'=>$this->name,
            'product'=>" $this->product",
            'code'=>" $this->code",
            'message'=> 'هذا هو الكود الخاص بالمنتج الذي قمت بشرائه'
        ];
    }
}
