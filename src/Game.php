<?php

namespace DaanMooij\Domino;

class Game
{
    /**
     * @var Player
     */
    private $playerOne;

    /**
     * @var Player
     */
    private $playerTwo;

    /**
     * @var Stock
     */
    private $stock;

    /**
     * @var Board
     */
    private $board;

    /**
     * @param string $nameOne
     * @param string $nameTwo
     */
    public function __construct(string $nameOne, string $nameTwo)
    {
        $this->stock = new Stock();
        $this->stock->shuffle();

        $this->playerOne = new Player($nameOne);
        $this->playerTwo = new Player($nameTwo);

        $this->playerOne->drawStartingTiles($this->stock);
        $this->playerTwo->drawStartingTiles($this->stock);

        $baseTile = $this->stock->drawOne();
        $this->board = new Board($baseTile);
    }

    /**
     * @return void
     */
    public function play(): void
    {
        Logger::start();
        Logger::log(sprintf('Game starting with tile: %s', $this->board->getLeftTile()));

        $currentPlayer = $this->playerOne;
        while (true) {
            try {
                $currentPlayer->play($this->board, $this->stock);
                Logger::log(sprintf('Board is now: %s', $this->board));
                if ($currentPlayer->hasTile()) {
                    $currentPlayer = $currentPlayer === $this->playerOne ? $this->playerTwo : $this->playerOne;
                } else {
                    Logger::log(sprintf('Player %s has won!', $currentPlayer->getName()));
                    break;
                }
            } catch (DominoException $exception) {
                Logger::log('Stock is empty. Game Over. Nobody won.');
                break;
            }
        }
        Logger::stop();
    }
}
