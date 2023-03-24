<?php

namespace App\Notifications;


use App\Models\Coin;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramMessage;

class CoinPublished extends Notification
{
    use Queueable;

    private $content;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($content)
    {
        $this->content = $content;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  Coin  $notifiable
     * @return array
     */
    public function via(Coin $notifiable)
    {
        return ['telegram'];
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
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  Coin  $notifiable
     * @return array
     */
    public function toArray(Coin $notifiable)
    {
        return [
            //
        ];
    }

    public function toTelegram(Coin $notifiable)
    {

        return TelegramMessage::create()
            ->token(config("services.telegram-bot-api.coinbaz_token"))
            ->to(config("services.telegram-bot-api.coinbaz_chat_id"))
            // Markdown supported.
            ->content($this->content);
    }
}
