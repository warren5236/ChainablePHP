<?php

use PHPO\String;

class StringTest extends PHPUnit_Framework_TestCase{
    public function testToString(){
        $string = 'test string';
        $stringObject = new String($string);

        $this->assertEquals($string, sprintf('%s', $stringObject));
        $this->assertEquals($string, $stringObject->getValue());

        $string .= 'asdf';
        $stringObject->setValue($string);
        $this->assertEquals($string, $stringObject->getValue());
    }

}
