<?php

namespace DaanMooij\Domino;

class Logger
{
    private const DIVIDER = '-------------------------------------------------------';

    /**
     * @param string $message
     * @return void
     */
    public static function log(string $message): void
    {
        echo $message . PHP_EOL;
    }

    /**
     * @return void
     */
    public static function start(): void
    {
        echo PHP_EOL;
        self::log(self::DIVIDER);
    }

    /**
     * @return void
     */
    public static function stop(): void
    {
        self::log(self::DIVIDER);
        echo PHP_EOL;
    }
}
