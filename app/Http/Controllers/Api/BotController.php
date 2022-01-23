<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
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
        $pesan = Telegram::commandsHandler(true);
        $isCommand = substr($pesan['message']['text'],0,1);
        if ($isCommand != "/") {
            $Str1 = preg_replace('/[\x00-\x1F\x7F-\xFF]/', '', $pesan['message']['text']); //normalisasi
            Telegram::sendMessage([
                        'chat_id' => $pesan['message']['chat']['id'],
                        'text' => "Sorry, command <b>" . $pesan['message']['text'] . "</b> wasn't found :/",
                        'parse_mode' => 'HTML',
                    ]);
        }

        return response()->json([
            "success" => true,
            "message" => "success",
            // "data" => $update,
        ], 200);
    }
}
