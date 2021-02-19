<?php

include '../common/autoload.php';

class Database
{
    private static $database;

    protected $productTable;
    protected $categoryTable;
    protected $accessoryTable;

    private function __construct(){}

    public static function createDatabase(): Database
    {
        if(self::$database !== null){
            return self::$database;
        }

        self::$database = new self();
        return self::$database;
    }

    public function __set($property, $value){
        $this->$property = $value;
    }

    public function __get($property)
    {
        return $this->$property;
    }

    public function insertTable($tableName, BaseRow $row){
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
            if($item->getName() == $elementName){
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
            if($item->getId() == $id){
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
            if($item->getName() == $name){
                return ($item);
            }
        }

        return false;
    }

    function updateTable($tableName, BaseRow $row){
        if(!isValidTableName($tableName)||is_null($this->$tableName)){
            return false;
        }

        foreach ($this->$tableName as $key => $item){
            if($item->getId() == $row->getId()){
                return($this->$tableName[$key] = $row);
            }
        }

        return false;
    }

    function deleteTable($tableName, $id): bool
    {
        if(!isValidTableName($tableName)||is_null($this->$tableName)){
            return false;
        }

        foreach ($this->$tableName as $key => $item){
            if($item->getId() == $id){
                unset($this->$tableName[$key]);
                return true;
            }
        }

        return false;
    }

    function truncateTable($tableName): bool
    {
        if(!isValidTableName($tableName)||is_null($this->$tableName)){
            return false;
        }

        unset($this->$tableName);

        return true;
    }

}
