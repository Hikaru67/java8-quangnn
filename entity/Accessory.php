<?php


class Accessory
{
    protected $id;
    protected $name;

    public function __construct($id, $name){
        $this->id = $id;
        $this->name = $name;
    }

    public function __set($property, $value){
        $this->$property = $value;
    }

    public function __get($property)
    {
        return $this->$property;
    }
}