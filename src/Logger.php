<?php

namespace DaanMooij\Domino;

class Logger
{
    const DIVIDER = '-------------------------------------------------------';

    public static function log(string $message): void
    {
        echo $message . PHP_EOL;
    }

    public static function start(): void
    {
        echo PHP_EOL;
        self::log(self::DIVIDER);
    }

    public static function stop(): void
    {
        self::log(self::DIVIDER);
        echo PHP_EOL;
    }
}
