<?php

namespace Commands;

use Telegram\Bot\Commands\Command;
use Telegram\Bot\Keyboard\Keyboard;
/**
 * Class MarkdownCommand.
 */
class MarkdownCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = 'markdown';

    /**
     * @var array Command Aliases
     */
    protected $aliases = ['keyboardmarkdown'];

    /**
     * @var string Command Description
     */
    protected $description = 'Test of markdown keyboard';

    /**
     * {@inheritdoc}
     */
    public function handle($arguments)
    {
        $keyboard = [
            ['7', '8', '9'],
            ['4', '5', '6'],
            [Keyboard::button(
                [
                    'text' => 'mapa',
                    'request_location' => true
                ])
            ],
            ['inlinekeyboardmarkup']
        ];
        $reply_markup = $this->telegram->replyKeyboardMarkup([
            'keyboard' => $keyboard,
            'resize_keyboard' => true,
            'one_time_keyboard' => true
        ]);
        $response = $this->replyWithMessage([
            'chat_id' => $this->update->getMessage()->getChat()->getId(),
            'text' => 'Hello World',
            'reply_markup' => $reply_markup
        ]);
    }
}