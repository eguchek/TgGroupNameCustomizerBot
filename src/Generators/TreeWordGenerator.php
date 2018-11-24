<?php
/**
 * Created by PhpStorm.
 * Author: e.guchek
 * Date: 24/11/18
 */

namespace Bot\Generators;


use Bot\Interfaces\INameGenerator;

class TreeWordGenerator implements INameGenerator
{
    private static $words = [
        'Л' => [
            'Лучший',
            'Лучше',
            'Лобстер'
        ],
        'с' => [
            'сегодня',
            'сидите',
            'снег',
            'самый'
        ],
        'д' => [
            'день',
            'дома',
            'дождя',
            'добрый'
        ]
    ];

    public function generateName()
    {
        $letters = ['Л', 'с', 'д'];
        $words = [];

        foreach ($letters as $letter) {
            $words[] = $this->wordByLetter($letter);
        }

        return implode(' ', $words);
    }

    private function wordByLetter($letter)
    {
        if (!array_key_exists($letter, self::$words)) {
            $message = sprintf('Unable to get word for letter %s. Unknown letter.', $letter);
            throw new \RuntimeException($message);
        }

        $randIndex = array_rand(self::$words[$letter]);

        return self::$words[$letter][$randIndex];
    }
}