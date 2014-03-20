<?php

use PHPO\StringObject;
use PHPO\ArrayObject;

class ArrayObjectTest extends PHPUnit_Framework_TestCase{
    public function testJoin(){
        $array = new ArrayObject('test', 'test');
        $this->assertEquals('test test', $array->join(' '));
    }
}
