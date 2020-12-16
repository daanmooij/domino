<?php

namespace DaanMooij\Domino;

class Board
{
    /**
     * @var array<Tile>
     */
    private $tiles;

    /**
     * @var Tile $baseTile
     */
    public function __construct(Tile $baseTile)
    {
        $this->tiles[] = $baseTile;
    }

    /**
     * @return Tile[]
     */
    public function getTiles(): array
    {
        return $this->tiles;
    }

    /**
     * @return Tile
     */
    public function getLeftTile(): Tile
    {
        return $this->tiles[0];
    }

    /**
     * @return Tile
     */
    public function getRightTile(): Tile
    {
        return $this->tiles[count($this->tiles) - 1];
    }

    /**
     * @return void
     */
    public function addToLeft(Tile $newTile): void
    {
        $leftTile = $this->tiles[0];

        if ($newTile->getRightEnd() !== $leftTile->getLeftEnd()) {
            throw new DominoException();
        }

        array_unshift($this->tiles, $newTile);
    }

    /**
     * @return void
     */
    public function addToRight(Tile $newTile): void
    {
        $rightTile = $this->tiles[count($this->tiles) - 1];

        if ($rightTile->getRightEnd() !== $newTile->getLeftEnd()) {
            throw new DominoException();
        }

        $this->tiles[] = $newTile;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return implode(' ', $this->tiles);
    }
}
