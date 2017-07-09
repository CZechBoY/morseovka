<?php

namespace CZechBoY\Morseovka;

use Tester\Assert;
use Tester\TestCase;

final class AlphaLetterTest extends TestCase
{
    /**
     * @param string $alphaLetter
     *
     * @dataProvider dataAlphaLetters
     */
    public function testAlphaLetter(string $alphaLetter)
    {
        $letter = new AlphaLetter($alphaLetter);
        
        Assert::same($alphaLetter, (string)$letter);
    }
    
    /**
     * @param string $invalidAlphaLetter
     *
     * @dataProvider dataInvalidAlphaLetters
     */
    public function testNumericThrowsException(string $invalidAlphaLetter)
    {
        Assert::throws(function() use ($invalidAlphaLetter) {
            $letter = new AlphaLetter($invalidAlphaLetter);
        }, NonAlphaLetterException::class, sprintf('"%s" is not a alpha letter.', $invalidAlphaLetter));
    }
    
    protected function dataAlphaLetters(): array
    {
        return [
            ['a'],
        ];
    }
    
    protected function dataInvalidAlphaLetters(): array
    {
        return [
            ['9'],
        ];
    }
}

(new LetterTest())->run()
