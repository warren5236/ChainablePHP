<?php

namespace PHPO;

class ArrayObject implements \Iterator
{
    protected $value = array();

    public function __construct(){
        $args = func_get_args();

        if(count($args) > 0){
            if(is_array($args[0])){
                foreach($args[0] as $key=>$value){
                    $this->value[$key] = $value;
                }
            } else {
                foreach($args as $value){
                    $this->value[] = $value;
                }
            }
        }
    }

    public function setValue($value){
        $this->value = $value;
        return $this;
    }

    public function getValue(){
        return $this->value;
    }

    public function getLength(){
        return count($this->value);
    }

    public function push($element){
        $this->value[] = $element;
        return $this;
    }

    public function pop(){
        return array_pop($this->value);
    }

    public function rewind()
    {
        reset($this->value);
    }

    public function current()
    {
        return current($this->value);
    }

    public function key()
    {
        key($this->value);
    }

    public function next(){
        return next($this->value);
    }

    public function valid(){
        $key = key($this->value);
        return ($key !== NULL && $key !== false);
    }

    public function join($delimiter = ' '){
        return new StringObject(implode($delimiter, $this->value));
    }
}
