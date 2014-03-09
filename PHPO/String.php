<?php

namespace PHPO;

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
}
