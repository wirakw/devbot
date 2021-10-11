<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
            'text' => 'Hello world!',
        ]);
        return;
    }

    public function webhook(Request $request)
    {
        $update = Telegram::commandsHandler(true);
        $isCommand = substr($update['message']['text'],0,1);
        if ($isCommand != "/") {
            Telegram::sendMessage([
                                'chat_id' => $update['message']['chat']['id'], 
                                'text' => "Sorry, command <b>" . $update['message']['text'] . "</b> wasn't found :/",
                                'parse_mode' => 'HTML',
                            ]);
        }
        
        return response()->json([
            "success" => true,
            "message" => "success",
            "data" => $update,
        ], 200);
    }
}
