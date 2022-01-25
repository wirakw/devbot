<?php

namespace App\Notifications;
use NotificationChannels\Telegram\TelegramMessage;
use Illuminate\Notifications\Notification;

class FromOtherService extends Notification
{
    public function via($notifiable)
    {
        return ["telegram"];
    }

    public function toTelegram($notifiable)
    {
        $url = "http://192.101.68.101:8080/download/kuitansi_WO_02_2021.pdf";

        return TelegramMessage::create()
            // Optional recipient user id.
            ->to('1221318726')
            // Markdown supported.
            ->content("Hello there!\nYour invoice has been *PAID*")

            // (Optional) Blade template for the content.
            // ->view('notification', ['url' => $url])

            // (Optional) Inline Buttons
            ->button('View Invoice', $url)
            ->button('Download Invoice', $url);
            // (Optional) Inline Button with callback. You can handle callback in your bot instance
            // ->buttonWithCallback('Confirm', 'confirm_invoice ' . $this->invoice->id);
    }
}
