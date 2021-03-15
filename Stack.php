<?php
include('StackInterface.php');

class Stack implements StackInterface
{
    /**
     * @var array
     */
    protected $stackArray = array();

    /**
     * Stack constructor.
     */
    public function __construct($stack) {
        // initialize the stack
        $this->stackArray = $stack;
    }

    /**
     * @return bool
     */
    public function isEmpty() {
        return empty($this->stackArray);
    }

    /**
     * @return mixed
     */
    public function pop() {
        if (!$this->isEmpty()) {
            return array_shift($this->stackArray);
        }
            throw new \Exception("Stack is Empty");

    }

    /**
     * @return mixed
     */
    public function top() {
        return current($this->stackArray);
    }

    /**
     * @param $str
     */
    public function push($str) {
        array_unshift($this->stackArray, $str);
    }

}