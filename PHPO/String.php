<?php

namespace PHPO;

use PHPO\ArrayObject;

class String
{
    protected $value = null;

    public function __construct($value){
        $this->value = $value;
    }

    public function __toString(){
        return $this->value;
    }

    public function setValue($value){
        $this->value = $value;
        return $this;
    }

    public function getValue(){
        return $this->value;
    }

    public function indexOf($test){
        $returnVal = stripos($this->value, $test);

        if($returnVal === false){
            return -1;
        }

        return $returnVal;
    }

    public function substring(){
        $args = func_get_args();

        $returnVal = '';

        if(count($args) == 1){
            $returnVal = substr($this->value, $args[0]);
        } elseif (count($args) == 2){
            $returnVal = substr($this->value, $args[0], $args[1]);
        }

        return new String($returnVal);
    }

    public function toLower(){
        return new String(strtolower($this->value));
    }

    public function toUpper(){
        return new String(strtoupper($this->value));
    }

    public function explode($delimiter){
        return new ArrayObject(explode($delimiter, $this->value));
    }
}
