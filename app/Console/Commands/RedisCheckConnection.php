<?php

namespace App\Console\Commands;

use Telegram;
use Illuminate\Console\Command;
use App\Notifications\ErrorNotif;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Notification;

class RedisCheckConnection extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'redis:testping';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'testping redis on several chanel';

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
        $client = Redis::connection()->client();
        if($client->isConnected()){
            $this->info('Connected');
        } else {
            $this->error('Fail to Connect');
            Notification::send('1221318726', new ErrorNotif('Fail to Connect to redis'));
        }

        return 0;
    }
}
