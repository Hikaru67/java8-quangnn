<?php

include 'InterfaceEntity.php';

abstract class BaseRow implements InterfaceEntity
{
    public function __set($property, $value){
        $this->$property = $value;
    }

    public function __get($property){
        return $this->$property;
    }

}