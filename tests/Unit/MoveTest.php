<?php

use HueHue\PgnParser\Struct\Move;
use HueHue\PgnParser\Struct\Variation;

describe('moves', function () {
    it('move to string', function () {
        $move = new Move('c5', 1, false, null, 'This is a comment');
        $moveVariation = new Move('Nf3', 2, true);
        $variation = new Variation();
        $variation->addMove($moveVariation);

        $move->addVariation($variation);

        expect((string) $move)->toBe('c5 {This is a comment} (2. Nf3)');
    });
});
