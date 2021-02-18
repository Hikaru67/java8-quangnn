<?php

include 'BaseRow.php';

class Category extends BaseRow
{
    protected $id;
    protected $name;

    public function __construct($id, $name){
        $this->id = $id;
        $this->name = $name;
    }

}