<?php

namespace App\Notifications;
use NotificationChannels\Telegram\TelegramMessage;
use Illuminate\Notifications\Notification;

class TelegramAssistance extends Notification
{
    public function via($payload)
    {
        return ["telegram"];
    }

    public function toTelegram($payload)
    {
        return TelegramMessage::create()
            // Optional recipient user id.
            ->to('1221318726')
            // Markdown supported.
            ->content("*Hello Wira*")
            ->content($payload->msg . "from excel name : " . $payload->file)
            // (Optional) Blade template for the content.
            // ->view('notification', ['url' => $url])

            // (Optional) Inline Buttons
            ->button('View Invoice', $payload->url)
            ->button('Download Pdf', $payload->url);
            // (Optional) Inline Button with callback. You can handle callback in your bot instance
            // ->buttonWithCallback('Confirm', 'confirm_invoice ' . $this->invoice->id);
    }
}
