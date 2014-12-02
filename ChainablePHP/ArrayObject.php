<?php

namespace ChainablePHP;

class ArrayObject implements \Iterator, \ArrayAccess
{
    protected $value = array();

    public function __construct()
    {
        $args = func_get_args();

        if (count($args) > 0) {
            if (is_array($args[0])) {
                foreach ($args[0] as $key => $value) {
                    $this->value[$key] = $value;
                }
            } else {
                foreach ($args as $value) {
                    $this->value[] = $value;
                }
            }
        }
    }

    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getLength()
    {
        return count($this->value);
    }

    public function push($element)
    {
        $this->value[] = $element;
        return $this;
    }

    public function pop()
    {
        return array_pop($this->value);
    }

    public function join($delimiter = ' ')
    {
        return new StringObject(implode($delimiter, $this->value));
    }

    public function getKeys()
    {
        return new ArrayObject(array_keys($this->value));
    }

    public function sortByKeys()
    {
        ksort($this->value);
        return $this;
    }

    /*
    * \Iterator
    */
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

    public function next()
    {
        return next($this->value);
    }

    public function valid()
    {
        $key = key($this->value);
        return ($key !== null && $key !== false);
    }

    /*
    * \ArrayAccess
    */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->value[] = $value;
        } else {
            $this->value[$offset] = $value;
        }
    }

    public function offsetExists($offset)
    {
        return isset($this->value[$offset]);
    }

    public function offsetUnset($offset)
    {
        unset($this->value[$offset]);
    }

    public function offsetGet($offset)
    {
        return isset($this->value[$offset]) ? $this->value[$offset] : null;
    }
}
