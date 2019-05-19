<?php

namespace DaanMooij\Domino;

class Player
{
    const NUMBER_OF_STARTING_TILES = 7;

    /** @var string */
    private $name;

    /** @var Tile[] */
    private $tiles;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function drawStartingTiles(Stock $stock): void
    {
        $this->tiles = $stock->draw(self::NUMBER_OF_STARTING_TILES);
    }

    public function hasTile(): bool
    {
        return !empty($this->tiles);
    }

    /**
     * @throws DominoException When the stock is empty when the player needs to draw one.
     */
    public function play(Board $board, Stock $stock): void
    {
        $leftEnd = $board->getLeftTile()->getLeftEnd();
        $rightEnd = $board->getRightTile()->getRightEnd();

        foreach ($this->tiles as $key => $tile) {
            if ($tile->getRightEnd() === $leftEnd) {
                $this->removeTile($key);
                $this->logMove($tile, $board->getLeftTile());
                $board->addToLeft($tile);
                return;
            }
            if ($tile->getLeftEnd() === $leftEnd) {
                $this->removeTile($key);
                $tile->flip();
                $this->logMove($tile, $board->getLeftTile());
                $board->addToLeft($tile);
                return;
            }
            if ($tile->getLeftEnd() === $rightEnd) {
                $this->removeTile($key);
                $this->logMove($tile, $board->getRightTile());
                $board->addToRight($tile);
                return;
            }
            if ($tile->getRightEnd() === $rightEnd) {
                $this->removeTile($key);
                $tile->flip();
                $this->logMove($tile, $board->getRightTile());
                $board->addToRight($tile);
                return;
            }
        }
        $this->tiles[] = $stock->drawOne();
        Logger::log(sprintf('%s can\'t play, drawing tile %s', $this->name, $this->getLastTile()));
        $this->play($board, $stock);
    }

    private function getLastTile(): Tile
    {
        return $this->tiles[count($this->tiles) - 1];
    }

    private function logMove(Tile $tile, Tile $boardTile): void
    {
        Logger::log(sprintf('%s plays %s to connect to tile %s on the board', $this->name, $tile, $boardTile));
    }

    private function removeTile(int $key): void
    {
        array_splice($this->tiles, $key, 1);
    }
}
