<?php

include '../common/autoload.php';
include_once 'PrevDatabase.php';

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

    public function insertTable($tableName, BaseRow2 $row){
        if(!isValidTableName($tableName)){
            return false;
        }
        return $this->$tableName[] = $row;
    }

    function selectTable($tableName, $elementName){
        if(!isValidTableName($tableName)||is_null($this->$tableName)){
            return false;
        }

        $table = array();

        foreach ($this->$tableName as $item){
            if($item->name == $elementName){
                $table[] = $item;
            }
        }

        return $table;
    }

    function findById($tableName, $id){
        if(!isValidTableName($tableName)||is_null($this->$tableName)){
            return false;
        }

        foreach ($this->$tableName as $item){
            if($item->id == $id){
                return $item;
            }
        }

        return false;
    }

    function findByName($tableName, $name){
        if(!isValidTableName($tableName)||is_null($this->$tableName)){
            return false;
        }

        foreach ($this->$tableName as $item){
            if($item->name == $name){
                return $item;
            }
        }

        return false;
    }

    function updateTable($tableName, $row){
        if(!isValidTableName($tableName)||is_null($this->$tableName)){
            return false;
        }

        foreach ($this->$tableName as $key => $item){
            if($item->id == $row->id){
                return($this->$tableName[$key] = $row);
            }
        }

        return false;

    }

    function deleteTable($tableName, $id){
        if(!isValidTableName($tableName)||is_null($this->$tableName)){
            return false;
        }

        foreach ($this->$tableName as $key => $item){
            if($item->id == $id){
                unset($this->$tableName[$key]);
                return true;
            }
        }

        return false;
    }

    function truncateTable($tableName){
        if(!isValidTableName($tableName)||is_null($this->$tableName)){
            return false;
        }

        unset($this->$tableName);

        return true;
    }

}

/*$haha = new Database();
$haha->insertTable('productTable', new Product(1, 'computer', 1));
$haha->insertTable('productTable', new Product(3, 'computer4', 3));
$haha->insertTable('productTable', new Product(4, 'computer', 15));
var_dump($haha->updateTable('productTable', new Product(4, 'computer4', 15)));
var_dump($haha->selectTable('productTable', 'computer4'));

var_dump($haha);*/