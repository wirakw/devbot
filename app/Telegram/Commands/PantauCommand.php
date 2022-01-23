<?php

namespace App\Telegram\Commands;

use Telegram;
use Telegram\Bot\Commands\Command;

/**
 * Class HelpCommand.
 */
class PantauCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = 'pantau';

    /**
     * @var array Command Aliases
     */
    protected $aliases = ['check'];

    /**
     * @var string Command Description
     */
    protected $description = 'check all service registered';

    /**
     * {@inheritdoc}
     */
    public function handle()
    {
        $response = $this->getUpdate();

        $text .= env('APP_URL') . chr(10) . chr(10);
        $text .= 'Please come and visit me there.' . chr(10);
        $this->replyWithMessage(compact('text'));
        $this->replyWithChatAction(['action' => Actions::TYPING]);
    }
}
