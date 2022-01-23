<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Redis;
use Telegram;

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
        Redis::subscribe(['telegram'], function ($message) {
            Telegram::sendMessage([
                'chat_id' => '1221318726',
                'text' => $message,
            ]);
            echo $message;
       }, $connection = 'socket');
    }
}
