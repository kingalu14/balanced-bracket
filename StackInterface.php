<?php

interface StackInterface
{


    /**
     * @return bool
     */
    public function isEmpty();

    /**
     * @return mixed
     */
    public function pop();

    /**
     * @return mixed
     */
    public function top();

    /**
     * @param $str
     */
    public function push($str);

    

}