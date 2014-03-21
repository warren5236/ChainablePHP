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

    public function testPush(){
        $array = new ArrayObject();
        $this->assertSame(0, $array->getLength());

        $array->push('test1');
        $this->assertSame(1, $array->getLength());

        $array->push('test2');
        $this->assertSame(2, $array->getLength());
    }

    public function testPop(){
        $array = new ArrayObject('test1', 'test2');
        $this->assertSame(2, $array->getLength());
        $this->assertSame('test2', $array->pop());
        $this->assertSame(1, $array->getLength());
        $this->assertSame('test1', $array->pop());
        $this->assertSame(0, $array->getLength());
        $this->assertSame(null, $array->pop());
    }

    public function testKeyAccess(){
        $array = new ArrayObject();
        $array['testkey'] = 'testvalue';
        $this->assertSame('testvalue', $array['testkey']);

        $this->assertTrue(isset($array['testkey']));
        unset($array['testkey']);
        $this->assertFalse(isset($array['testkey']));
    }
}
