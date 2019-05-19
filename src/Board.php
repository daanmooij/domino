<?php

namespace DaanMooij\Domino;

class Board
{
    /** @var Tile[] */
    private $tiles;

    public function __construct(Tile $baseTile)
    {
        $this->tiles[] = $baseTile;
    }

    /** @return Tile[] */
    public function getTiles(): array
    {
        return $this->tiles;
    }

    public function getLeftTile(): Tile
    {
        return $this->tiles[0];
    }

    public function getRightTile(): Tile
    {
        return $this->tiles[count($this->tiles) - 1];
    }

    public function addToLeft(Tile $newTile): void
    {
        $leftTile = $this->tiles[0];

        if ($newTile->getRightEnd() !== $leftTile->getLeftEnd()) {
            throw new DominoException();
        }

        array_unshift($this->tiles, $newTile);
    }

    public function addToRight(Tile $newTile): void
    {
        $rightTile = $this->tiles[count($this->tiles) - 1];

        if ($rightTile->getRightEnd() !== $newTile->getLeftEnd()) {
            throw new DominoException();
        }

        $this->tiles[] = $newTile;
    }

    public function __toString(): string
    {
        return implode(' ', $this->tiles);
    }
}
