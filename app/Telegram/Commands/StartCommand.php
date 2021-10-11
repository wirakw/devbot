<?php

namespace App\Telegram\Commands;

use Telegram;
use Telegram\Bot\Commands\Command;

/**
 * Class HelpCommand.
 */
class StartCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = 'start';

    /**
     * @var array Command Aliases
     */
    protected $aliases = ['listcommands'];

    /**
     * @var string Command Description
     */
    protected $description = 'Help command, Get a list of all commands';

    /**
     * {@inheritdoc}
     */
    public function handle()
    {
        $this->getUpdate();

        $text = 'Hey stranger, thanks for visiting me.' . chr(10) . chr(10);
        $text .= 'I am a bot and working for' . chr(10);
        $text .= env('APP_URL') . chr(10) . chr(10);
        $text .= 'Please come and visit me there.' . chr(10);

        $this->replyWithMessage(compact('text'));
    }
}
