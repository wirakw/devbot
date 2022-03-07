<?php

namespace App\Notifications;
use NotificationChannels\Telegram\TelegramMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;

class TelegramAssistance extends Notification
{
    public $data;
    public function via($payload)
    {
        return ["telegram"];
    }
    public function __construct($data)
    {
        $this->data = $data;
    }
    public function toTelegram($payload)
    {
        $response = json_decode($this->data, true);
        log::info($payload);
        return TelegramMessage::create()
            // Optional recipient user id.
            ->to('1221318726')
            // Markdown supported.
            // ->content("*Hello Wira*");
            ->content($response['msg'] . "from excel name : " . $response['file'])
            // (Optional) Blade template for the content.
            // ->view('notification', ['url' => $url])

            // (Optional) Inline Buttons
            // ->button('View Invoice', $data['url'])
            ->button('Download Pdf', $response['url']);
            // (Optional) Inline Button with callback. You can handle callback in your bot instance
            // ->buttonWithCallback('Confirm', 'confirm_invoice ' . $this->invoice->id);
    }
}
