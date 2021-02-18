<?php

include_once 'BaseRow.php';

class Accessory extends BaseRow
{
    protected $id;
    protected $name;

    public function __construct($id, $name){
        $this->id = $id;
        $this->name = $name;
    }

}