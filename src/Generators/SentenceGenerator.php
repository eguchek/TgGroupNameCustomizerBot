<?php
/**
 * Created by PhpStorm.
 * Author: e.guchek
 * Date: 08/01/19
 */

namespace Bot\Generators;


use Bot\Interfaces\INameGenerator;

class SentenceGenerator implements INameGenerator
{

    public static $sentences = [
        'Лучший сегодня день',
        'Лучший сегодня дома',
        'Лучший сегодня добрый',
        'Лучший снег дома',
        'Лучший снег добрый',
        'Лучший самый день',
        'Лучший самый дома',
        'Лучший самый добрый',
        'Лучше сегодня дома',
        'Лучше сидите дома',
        'Лучше снег дома',
        'Лучше снег добрый',
        'Лобстер сегодня дома',
        'Лобстер сегодня добрый',
        'Лобстер самый добрый',
    ];

    public function generateName()
    {
        $randIndex = array_rand(self::$sentences);

        return self::$sentences[$randIndex];
    }
}