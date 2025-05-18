<?php

use HueHue\PgnParser\Struct\Move;
use HueHue\PgnParser\Struct\PGN;
use HueHue\PgnParser\Struct\Variation;

describe('PGN', function () {
    test('pgn to string', function () {
        $pgn = new PGN();

        $variation1Move = new Move('Nf3', 2, true);
        $variation1Move2 = new Move('d6', 2, false);
        $variation = new Variation();
        $variation->addMove($variation1Move);
        $variation->addMove($variation1Move2);

        $pgn->addMove(new Move('e4', 1, true, '!', 'This is a comment'));
        $move2 = new Move('c5', 2, false);
        $move2->addVariation($variation);
        $pgn->addMove($move2);
        $pgn->addMove(new Move('Nf3', 2, true));

        expect((string) $pgn)->toEqual('1. e4! {This is a comment} c5 (2. Nf3 d6) 2. Nf3');
    });
});
