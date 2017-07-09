<?php

namespace CZechBoY\Morseovka;

use Tester\Assert;
use Tester\TestCase;

final class LetterTest extends TestCase
{
    public function testAlphaLetter()
    {
        $letter = new Letter('a');
        
        Assert::same((string)$letter, 'a');
    }
    
    public function testNumericThrowsException()
    {
        Assert::throws(function() {
            $letter = new Letter('9');
        }, NonAlphaLetterException::class, '"9" is not a alpha letter.');
    }
}

(new LetterTest())->run()
