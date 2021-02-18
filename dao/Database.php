<?php

include '../common/autoload.php';

class Database
{
    protected $productTable;
    protected $categoryTable;
    protected $accessoryTable;

    public function __set($property, $value){
        $this->$property = $value;
    }

    public function __get($property)
    {
        return $this->$property;
    }

    function insertTable($tableName, $row){
        if(in_array(get_class($row), ENTITY_TYPE))
            return $this->$tableName[] = $row;
        else
            return false;
    }

    function selectTable($tableName, $elementName){
        $table = array();

        foreach ($this->$tableName as $item){
            if($item->name == $elementName){
                $table[] = $item;
            }
        }

        return $table;
    }

    function findById($tableName, $id){

        foreach ($this->$tableName as $item){
            if($item->id == $id){
                return $item;
            }
        }

        return false;
    }

    function findByName($tableName, $name){

        foreach ($this->$tableName as $item){
            if($item->name == $name){
                return $item;
            }
        }

        return false;
    }

    function updateTable($tableName, $row){

        foreach ($this->$tableName as $key => $item){
            if($item->id == $row->id){
                return($this->$tableName[$key] = $row);
            }
        }

        return 0;
    }

    function deleteTable($tableName, $id){

        foreach ($this->$tableName as $key => $item){
            if($item->id == $id){
                unset($this->$tableName[$key]);
                return 1;
            }
        }

        return 0;
    }

    function truncateTable($tableName){

        unset($this->$tableName);

    }


}

/*$haha = new Database();
$haha->insertTable('productTable', new Product(1, 'computer', 1));
$haha->insertTable('productTable', new Product(3, 'computer4', 3));
$haha->insertTable('productTable', new Product(4, 'computer', 15));
var_dump($haha->updateTable('productTable', new Product(4, 'computer4', 15)));
var_dump($haha->selectTable('productTable', 'computer4'));

var_dump($haha);*/