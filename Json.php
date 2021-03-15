<?php


class Json
{
    /**
     * @param $data
     * @return false|string
     */
    public static function from($data){
        return json_encode($data);
    }

    /**
     * @param $message
     * @return false|string
     */
    public static function printJsonMessage($type,$message) {
        $arr = [
            'type'=>$type,
            'message'=>$message
        ];
        print_r(Json::from($arr));
    }

}