<?php

use ChainablePHP\StringObject;
use ChainablePHP\ArrayObject;

class StringObjectTest extends PHPUnit_Framework_TestCase{
    public function testToString(){
        $string = 'test string';
        $stringObject = new StringObject($string);

        $this->assertEquals($string, sprintf('%s', $stringObject));
        $this->assertEquals($string, $stringObject->getValue());

        $string .= 'asdf';
        $stringObject->setValue($string);
        $this->assertEquals($string, $stringObject->getValue());
    }

    public function testIndexoOf(){
        $input = 'asdf foo';
        $string = new StringObject($input);

        $this->assertSame(-1, $string->indexOf('test'));
        $this->assertSame(0, $string->indexOf('asdf'));
        $this->assertSame(5, $string->indexOf('foo'));
    }

    public function testSubstring(){
        $input = 'asdf foo';
        $string = new StringObject($input);

        $this->assertEquals('foo', $string->substring(5));
        $this->assertEquals('asdf', $string->substring(0,4));
    }

    public function testToLower(){
        $input = 'ASDF Foo';
        $string = new StringObject($input);
        $this->assertEquals('asdf foo', $string->toLower());
    }

    public function testToUpper(){
        $input = 'ASDF Foo';
        $string = new StringObject($input);
        $this->assertEquals('ASDF FOO', $string->toUpper());
    }

    public function testExplode(){
        $input = 'test test test';
        $string = new StringObject($input);

        $this->assertEquals(new ArrayObject('test', 'test', 'test'), $string->explode(' '));
    }
}
