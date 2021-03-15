<?php


class MatchBracket
{

    /**
     * @param $expr1
     * @param $expr2
     * @return bool
     */

    public static function isMatchingPair($expr1, $expr2)
    {
        if($expr1 == Bracket::LROUND && $expr2==Bracket::RROUND)
            return true;
        else if($expr1 == Bracket::LCURLY &&  $expr2==Bracket::RCURLY)
            return true;
        else if($expr1 == Bracket::LSQUARE  && $expr2 == Bracket::RSQUARE)
            return true;
        else
            return false;
    }

}