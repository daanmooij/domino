<?php

namespace DaanMooij\Domino;

use PHPUnit\Framework\TestCase;

class TileTest extends TestCase
{
    /**
     * @test
     * @dataProvider tileData
     */
    public function flip(int $leftEnd, int $rightEnd): void
    {
        $tile = new Tile($leftEnd, $rightEnd);
        $tile->flip();

        $this->assertEquals($leftEnd, $tile->getRightEnd());
        $this->assertEquals($rightEnd, $tile->getLeftEnd());
    }

    public function tileData(): array
    {
        return [
            [0, 0],
            [0, 6],
            [1, 4],
            [4, 4],
            [4, 1]
        ];
    }
}
