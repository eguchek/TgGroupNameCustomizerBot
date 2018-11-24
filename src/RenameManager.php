<?php
/**
 * Created by PhpStorm.
 * Author: e.guchek
 * Date: 24/11/18
 */

namespace Bot;


class RenameManager
{

    private $bot;

    public function __construct(\Telegram $bot)
    {
        $this->bot = $bot;
    }

    public function doRename($groupId, $newName)
    {
        $content = [
            'chat_id' => $groupId,
            'title' => $newName
        ];
        $result = $this->bot->setChatTitle($content);
        return $result['ok'];
    }
}