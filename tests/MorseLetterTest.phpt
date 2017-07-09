<?php

namespace CZechBoY\Morseovka;

use Tester\Assert;
use Tester\TestCase;

final class MorseLetterTest extends TestCase
{
    /**
     * @param string $morseLetter
     *
     * @dataProvider dataValidMorseLetters
     */
    public function testOnlyDotsAndDashes(string $morseLetter)
    {
        $letter = new MorseLetter($morseLetter);
        
        Assert::same($morseLetter, (string)$letter);
    }
    
    /**
     * @param string $invalidMorseLetter
     *
     * @dataProvider dataInvalidMorseLetters
     */
    public function testNonValidCharacters(string $invalidMorseLetter)
    {
        Assert::throws(function() {
            $letter = new MorseLetter($invalidMorseLetter);
        }, NonDotDashLetterException::class, sprintf('"%s" is not a valid dot-dashed letter.', $invalidMorseLetter));
    }
    
    protected function dataValidMorseLetters(): array
    {
        return [
            ['.'],
            ['-'],
            ['.-'],
            ['-.'],
        ];
    }
    
    protected function dataInvalidMorseLetter(): array
    {
        return [
            ['a'],
            ['9'],
            [',.-'],
            ['-.,'],
        ];
    }
}

(new MorseLetterTest())->run();
