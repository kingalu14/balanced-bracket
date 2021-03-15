<?php

include('Bracket.php');
include('BalancedBracketInterface.php');
include('Json.php');
include('Stack.php');
include('MatchBracket.php');
include('StringToArray.php');


class BalancedBracket implements BalancedBracketInterface
{

    /**
     * @var int
     */
    protected $invalidBracketCounter=0;

    /**
     * @var array
     */
    protected $stackArray = array();

    /**
     * @var Stack
     */
    protected $stack;

    /**
     * BalancedBracket constructor.
     */
    public function __construct() {
        // initialize the stack
        $this->stack =  new Stack($this->stackArray);
    }
    /**
     * @param $myString
     */
    public function check($myString){
          $str_array =StringToArray::charArray($myString);

          for ($i=0; $i < count($str_array); $i++){
            //  If the input string contains an opening parenthesis,
            //  push in on to the stack.
            if (($str_array[$i] == Bracket::LCURLY)  ||
                ($str_array[$i] == Bracket::LROUND)  ||
                ($str_array[$i] == Bracket::LSQUARE)
            ) {
                $this->stack->push($str_array[$i]);
            }
            else {

                // If the input string contains a closing bracket,
                // then pop the corresponding opening parenthesis if
                // present.
                $top =  $this->stack->top();

                if( ($str_array[$i] == Bracket::RROUND) ||
                    ($str_array[$i] == Bracket::RCURLY) ||
                    ($str_array[$i] == Bracket::RSQUARE)
                ){
                       $this->invalidBracketCounter++;
                  if($this->stack->isEmpty()){
                       $this->invalidBracketCounter++;
                       if( $this->invalidBracketCounter > 9){
                           Json::printJsonMessage("fail","Cok Fazla Kapanmamis Parantez Var");
                           return;
                       }

                    }else{
                        if(MatchBracket::isMatchingPair($top,$str_array[$i]))
                            $this->stack->pop();
                        else{
                             Json::printJsonMessage("fail","Basarisiz");
                             return false;
                        }
                    }
                }
            }
        }
          $this->result();

    }

    public function result()
    {
        if($this->stack->isEmpty()){
            Json::printJsonMessage("success","Basarili");
        }else{
            Json::printJsonMessage("fail","Basarisiz");
        }
    }
}

$input_str1 = "{{{}[]}}";
$input_str2 = "{[]{}(})";
$input_str3 = "([{}])))))))))))))))))))))))))))";
$validateParanthesis = new BalancedBracket();
$validateParanthesis->check($input_str2);