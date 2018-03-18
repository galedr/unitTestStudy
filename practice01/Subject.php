<?php

class StringParser
{
    public function parse(String $string)
    {
        $result = array();
        if (!empty($string)) {
            $result = explode(',', $string);
        }
        return $result;
    }
}