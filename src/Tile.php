<?php

namespace DaanMooij\Domino;

class Tile
{
    /** @var int */
    private $leftEnd;

    /** @var int */
    private $rightEnd;

    public function __construct(int $leftEnd, int $rightEnd)
    {
        $this->leftEnd = $leftEnd;
        $this->rightEnd = $rightEnd;
    }

    public function getLeftEnd(): int
    {
        return $this->leftEnd;
    }

    public function getRightEnd(): int
    {
        return $this->rightEnd;
    }

    public function flip(): void
    {
        $leftEnd = $this->leftEnd;
        $this->leftEnd = $this->rightEnd;
        $this->rightEnd = $leftEnd;
    }

    public function __toString(): string
    {
        return sprintf('<%d:%d>', $this->leftEnd, $this->rightEnd);
    }
}
