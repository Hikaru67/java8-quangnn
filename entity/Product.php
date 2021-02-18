<?php



class Product
{
    protected $id;
    protected $name;
    protected $categoryId;

    /*public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }*/
    public function __construct($id, $name, $categoryId){
        $this->id = $id;
        $this->name = $name;
        $this->categoryId = $categoryId;
    }

    public function __set($property, $value){
        $this->$property = $value;
    }

    public function __get($property)
    {
        return $this->$property;
    }

}