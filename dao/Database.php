<?php

include '../common/required.php';

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

    function insertTable($name, $row){
        $this->$name[] = $row;
    }

    function selectTable($name, $where){
        $table = array();

        foreach ($this->$name as $item){
            if($item->name == $where){
                $table[] = $item;
            }
        }

        return $table;
    }

    function updateTable($name, $row){

        foreach ($this->$name as $key => $item){
            if($item->id == $row->id){
                return($this->$name[$key] = $row);
            }
        }

        return 0;
    }

    function deleteTable($name, $row){

        foreach ($this->$name as $key => $item){
            if($item->id == $row){
                unset($this->$name[$key]);
                return 1;
            }
        }

        return 0;
    }

    function truncateTable($name){

        unset($this->$name);

    }


}

/*$haha = new Database();
$haha->insertTable('productTable', new Product(1, 'computer', 1));
$haha->insertTable('productTable', new Product(3, 'computer4', 3));
$haha->insertTable('productTable', new Product(4, 'computer', 15));
var_dump($haha->updateTable('productTable', new Product(4, 'computer4', 15)));
var_dump($haha->selectTable('productTable', 'computer4'));

var_dump($haha);*/