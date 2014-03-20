<?php

namespace PHPO;

class ArrayObject
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

    public function join($delimiter = ' '){
        return new StringObject(implode($delimiter, $this->value));
    }
}
