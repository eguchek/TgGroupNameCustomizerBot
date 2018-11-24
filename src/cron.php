<?php
/**
 * Created by PhpStorm.
 * Author: e.guchek
 * Date: 24/11/18
 */

use Bot\Interfaces\INameGenerator;

require __DIR__.'/../vendor/autoload.php';

$bot = new Telegram(\Bot\Config::BOT_TOKEN);
$groupId = \Bot\Config::GROUP_ID;

$nameGenerator = new \Bot\Generators\TreeWordGenerator();
if (!$nameGenerator instanceof INameGenerator) {
    $message = sprintf('Generator %s must implement %s interface',
        get_class($nameGenerator),
        INameGenerator::class
    );
    throw new RuntimeException($message);
}
$newName = $nameGenerator->generateName();

$renameManager = new \Bot\RenameManager($bot);
$renameManager->doRename($groupId, $newName);