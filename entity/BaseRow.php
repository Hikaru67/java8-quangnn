<?php

include 'BaseRow2.php';

abstract class BaseRow implements BaseRow2
{
    public function __set($property, $value){
        $this->$property = $value;
    }

    public function __get($property){
        return $this->$property;
    }

}