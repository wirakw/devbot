<?php

namespace App\Console\Commands;

use Telegram;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;
use App\Http\Controllers\Api\BotController;
use Illuminate\Support\Facades\Notification;
use App\Notifications\TelegramAssistance;

class RedisSubscribe extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'redis:subscribe';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'subscribe redis on several chanel';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Redis::subscribe(['telegram'], function ($payload) {
            Notification::send('1221318726', new TelegramAssistance($payload));
            // $controller = new BotController();
            // $controller->sendMessage($payload);
            echo $payload;
        });

        // $client = Redis::connection()->client();

        // if($client->isConnected()){
        //     $this->line('Connected'); // Prints "Connected"
        // }

        // $client->subscribe(['telegram'], [$this, 'callback']);

        // return 0;

    }
}
