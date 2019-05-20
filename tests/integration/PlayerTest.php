<?php

namespace DaanMooij\Domino;

use PHPUnit\Framework\TestCase;

class PlayerTest extends TestCase
{
    const PLAYER_NAME = 'Alice';
    const NUMBER_OF_TILES_DRAWN = 7;

    /** @var Player */
    private $player;

    /** @var Stock */
    private $stock;

    public function setUp(): void
    {
        $this->player = new Player(self::PLAYER_NAME);
        $this->stock = new Stock();
    }

    /** @test */
    public function drawTiles(): void
    {
        $this->player->drawStartingTiles($this->stock);
        $this->assertCount(self::NUMBER_OF_TILES_DRAWN, $this->player->getTiles());
    }
}
