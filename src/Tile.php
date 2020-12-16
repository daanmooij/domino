<?php

namespace DaanMooij\Domino;

class Tile
{
    /**
     * @var int
     */
    private $leftEnd;

    /**
     * @var int
     */
    private $rightEnd;

    /**
     * @param int $leftEnd
     * @param int $rightEnd
     */
    public function __construct(int $leftEnd, int $rightEnd)
    {
        $this->leftEnd = $leftEnd;
        $this->rightEnd = $rightEnd;
    }

    /**
     * @return int
     */
    public function getLeftEnd(): int
    {
        return $this->leftEnd;
    }

    /**
     * @return int
     */
    public function getRightEnd(): int
    {
        return $this->rightEnd;
    }

    /**
     * @return void
     */
    public function flip(): void
    {
        $leftEnd = $this->leftEnd;
        $this->leftEnd = $this->rightEnd;
        $this->rightEnd = $leftEnd;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return sprintf('<%d:%d>', $this->leftEnd, $this->rightEnd);
    }
}
