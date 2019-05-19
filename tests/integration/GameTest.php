<?php

namespace DaanMooij\Domino;

use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    const PLAYER_ONE = 'Alice';
    const PLAYER_TWO = 'Bob';

    /** @test */
    public function play(): void
    {
        $game = new Game(self::PLAYER_ONE, self::PLAYER_TWO);
        $game->play();

        // If it reaches here, it means that the game ran without exceptions.
        $this->assertTrue(true);
    }
}
