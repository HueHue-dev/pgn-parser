<?php

use HueHue\PgnParser\Struct\Move;
use HueHue\PgnParser\Struct\Variation;

describe('variations', function () {
    it('variation to string', function () {
        $variation1Move1 = new Move('Nf3', 1, true);
        $variation1Move2 = new Move('d6', 1, false);
        $variation = new Variation();
        $variation->addMove($variation1Move1);
        $variation->addMove($variation1Move2);

        expect((string) $variation)->toBe('(1. Nf3 d6)');
    });
});
