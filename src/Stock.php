<?php

namespace DaanMooij\Domino;

class Stock
{
    private const STARTING_END = 0;
    private const ENDING_END = 6;

    /** @var Tile[] */
    private $tiles;

    public function __construct()
    {
        $this->initializeTiles();
    }

    public function shuffle(): void
    {
        shuffle($this->tiles);
    }

    /**
     * @throws DominoException When the stock is empty.
     */
    public function pop(): Tile
    {
        if (empty($this->tiles)) {
            throw new DominoException();
        }

        return array_pop($this->tiles);
    }

    public function hasTile(): bool
    {
        return !empty($this->tiles);
    }

    /**
     * Generates a collection of all possible tiles without duplicates.
     */
    private function initializeTiles(): void
    {
        for ($leftEnd = self::STARTING_END; $leftEnd <= self::ENDING_END; $leftEnd++) {
            for ($rightEnd = $leftEnd; $rightEnd <= self::ENDING_END; $rightEnd++) {
                $this->tiles[] = new Tile($leftEnd, $rightEnd);
            }
        }
    }
}
