<?php

use ChainablePHP\StringObject;
use ChainablePHP\ArrayObject;

namespace ChainablePHP;

class ChainTest extends \PHPUnit_Framework_TestCase
{
    public function testUcfirst()
    {
        $string = new StringObject("this is a test string");

        $output = $string
            ->explode(' ')
            ->ucfirst()
            ->join(' ');
        $this->assertSame('This Is A Test String', $output->getValue());
    }

    public function testSubstring()
    {
        $string = new StringObject("this is a test string");

        $output = $string
            ->explode(' ')
            ->substring(0, 1)
            ->join(' ');
        $this->assertSame('t i a t s', $output->getValue());
    }
}
