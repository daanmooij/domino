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
    public function pop_one(): void
    {
        $tile = $this->stock->pop();

        $this->assertInstanceOf(Tile::class, $tile);
    }

    /** @test */
    public function pop_all(): void
    {
        $this->assertTrue($this->stock->hasTile());

        for ($i = 0; $i < self::NUMBER_OF_TILES; $i++) {
            $this->stock->pop();
        }

        $this->assertFalse($this->stock->hasTile());
    }

    /** @test */
    public function pop_exception(): void
    {
        $this->expectException(DominoException::class);

        for ($i = 0; $i <= self::NUMBER_OF_TILES; $i++) {
            $this->stock->pop();
        }
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
