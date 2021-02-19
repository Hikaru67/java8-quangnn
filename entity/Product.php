<?php

include 'BaseRow.php';

class Product extends BaseRow
{
    protected $id;
    protected $name;
    protected $categoryId;

    public function __construct($id, $name, $categoryId){
        $this->id = $id;
        $this->name = $name;
        $this->categoryId = $categoryId;
    }

    public function getCategoryId(){
        return $this->categoryId;
    }

}