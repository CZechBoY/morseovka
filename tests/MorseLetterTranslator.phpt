<?php

namespace CZechBoY\Morseovka;

use Tester\Assert;
use Tester\TestCase;

final MorseLetterTranslatorTest extends TestCase
{
    /**
     * @param AlphaLetter $toTranslate
     * @param MorseLetter $expectedTranslation
     *
     * @dataProvider dataLetters
     */
    public function testToMorse(AlphaLetter $toTranslate, MorseLetter $expectedTranslation)
    {
        $translator = new MorseTranslator();
        
        $morseLetter = $translator->translateToMorse($toTranslate);
        
        Assert::same($expectedTranslation, $morseLetter);
    }
    
    protected function dataLetters(): array
    {
        return [
            [new AlphaLetter('a'), MorseLetter::fromString('.-')],
        ];
    }
}

(new MorseTranslatorTest())->run();
