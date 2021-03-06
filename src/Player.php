<?php

namespace DaanMooij\Domino;

class Player
{
    private const NUMBER_OF_STARTING_TILES = 7;

    /**
     * @var string
     */
    private $name;

    /**
     * @var array<Tile>
     */
    private $tiles;

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return array<Tile>
     */
    public function getTiles(): array
    {
        return $this->tiles;
    }

    /**
     * @param Stock $stock
     * @return void
     */
    public function drawStartingTiles(Stock $stock): void
    {
        $this->tiles = $stock->draw(self::NUMBER_OF_STARTING_TILES);
    }

    /**
     * @return bool
     */
    public function hasTile(): bool
    {
        return !empty($this->tiles);
    }

    /**
     * @param Board $board
     * @param Stock $stock
     * @throws DominoException When the stock is empty when the player needs to draw one.
     * @return void
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

    /**
     * @return Tile
     */
    private function getLastTile(): Tile
    {
        return $this->tiles[count($this->tiles) - 1];
    }

    /**
     * @param Tile $tile
     * @param Tile $boardTile
     * @return void
     */
    private function logMove(Tile $tile, Tile $boardTile): void
    {
        Logger::log(sprintf('%s plays %s to connect to tile %s on the board', $this->name, $tile, $boardTile));
    }

    /**
     * @param int $key
     * @return void
     */
    private function removeTile(int $key): void
    {
        array_splice($this->tiles, $key, 1);
    }
}
