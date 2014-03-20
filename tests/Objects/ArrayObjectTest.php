<?php

use PHPO\StringObject;
use PHPO\ArrayObject;

class ArrayObjectTest extends PHPUnit_Framework_TestCase{
    public function testJoin(){
        $array = new ArrayObject('test', 'test');
        $this->assertEquals('test test', $array->join(' '));
    }

    public function testForeach(){
        $array = array('test1', 'test2');

        $object = new ArrayObject($array);

        $count = 0;
        foreach($object as $item){
            $this->assertSame($array[$count], $item);
            $count++;
        }
    }
}
