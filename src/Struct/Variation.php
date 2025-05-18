<?php

namespace HueHue\PgnParser\Struct;

class Variation
{
    /** @var array<int, Move> */
    protected array $moves = [];

    public function getMoves(): array
    {
        return $this->moves;
    }

    public function addMove(Move $move): void
    {
        $this->moves[] = $move;
    }

    public function __toString(): string
    {
        $moveNumber = null;
        $isWhiteMove = true;

        $output = '';

        foreach ($this->moves as $move) {
            if (null === $moveNumber) {
                $moveNumber = $move->getNumber();
            }
            if ($isWhiteMove) {
                $output .= $moveNumber.'. ';
            }
            $output .= (string) $move.' ';

            $isWhiteMove = !$isWhiteMove;
            if (!$isWhiteMove) {
                ++$moveNumber;
            }
        }

        return sprintf('(%s)', trim($output));
    }
}
