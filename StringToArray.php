<?php


class StringToArray
{

    /**
     * @param $string
     * @return array
     */
    public static function charArray($string){
        $char_array = Array();
        for($i=0;$i<strlen($string);$i++){
            $char_array[$i] = substr($string,$i,1);
       }
        return  $char_array;
    }

}