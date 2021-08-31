<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Queue;
use Telegram;

class BotController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('customAuth');
    }

    public function getUpdate()
    {
        $updates = Telegram::getUpdates();
        return (json_encode($updates));
    }

    public function sendMessage()
    {
        Telegram::sendMessage([
            'chat_id' => '1221318726',
            'text' => 'Hello world!'
        ]);
        return;
    }

    public function webhook()
    {
        return response()->json([
            "success" => true,
            "message" => "success",
        ], 200);
    }
}
