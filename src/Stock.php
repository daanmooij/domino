<?php

namespace DaanMooij\Domino;

class Stock
{
    private const STARTING_END = 0;
    private const ENDING_END = 6;

    /**
     * @var array<Tile>
     */
    private $tiles;

    public function __construct()
    {
        $this->initializeTiles();
    }

    /**
     * @return void
     */
    public function shuffle(): void
    {
        shuffle($this->tiles);
    }

    /**
     * @param int $number
     * @throws DominoException When the stock doesn't have enough tiles.
     * @return array<Tile>
     */
    public function draw(int $number): array
    {
        $tiles = [];
        for ($i = 0; $i < $number; $i++) {
            $tiles[] = $this->drawOne();
        }
        return $tiles;
    }

    /**
     * @return bool
     */
    public function hasTile(): bool
    {
        return !empty($this->tiles);
    }

    /**
     * @throws DominoException When the stock is empty.
     * @return Tile
     */
    public function drawOne(): Tile
    {
        if (empty($this->tiles)) {
            throw new DominoException();
        }

        return array_pop($this->tiles);
    }

    /**
     * Generates a collection of all possible tiles without duplicates.
     * @return void
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
