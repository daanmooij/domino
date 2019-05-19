<?php

namespace DaanMooij\Domino;

use PHPUnit\Framework\TestCase;

class StockTest extends TestCase
{
    const NUMBER_OF_TILES = 28;

    /** @var Stock */
    private $stock;

    public function setUp(): void
    {
        $this->stock = new Stock();
    }

    /** @test */
    public function draw_one(): void
    {
        $tile = $this->stock->drawOne();

        $this->assertInstanceOf(Tile::class, $tile);
    }

    /** @test */
    public function draw_all(): void
    {
        $this->assertTrue($this->stock->hasTile());

        $this->stock->draw(self::NUMBER_OF_TILES);

        $this->assertFalse($this->stock->hasTile());
    }

    /** @test */
    public function draw_exception(): void
    {
        $this->expectException(DominoException::class);

        $this->stock->draw(self::NUMBER_OF_TILES + 1);
    }

    /** @test */
    public function shuffle(): void
    {
        $stock = new Stock();

        $this->assertEquals($stock, $this->stock);

        $this->stock->shuffle();

        $this->assertNotEquals($stock, $this->stock);
    }
}
