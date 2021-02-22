<?php

include_once 'BaseRow.php';

class Accessory extends BaseRow
{

    public function __construct($id, $name){
        $this->id = $id;
        $this->name = $name;
    }

}