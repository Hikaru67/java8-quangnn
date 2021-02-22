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

    public function setProductTable($productTable){
        $this->productTable = $productTable;
    }
    public function setCategoryTable($categoryTable){
        $this->categoryTable = $categoryTable;
    }
    public function setAccessoryTable($accessoryTable){
        $this->accessoryTable = $accessoryTable;
    }

    public function getProductTable(){
        return $this->productTable;
    }
    public function getCategoryTable(){
        return $this->categoryTable;
    }
    public function getAccessoryTable(){
        return $this->accessoryTable;
    }

    public function getTable($tableName){
        switch ($tableName) {
            case PRODUCT_TABLE:
                return $this->getProductTable();
                break;
            case CATEGORY_TABLE:
                return $this->getCategoryTable();
                break;
            case ACCESSORY_TABLE:
                return $this->getAccessoryTable();
                break;
        }
        return false;
    }

    /*public function getTable($tableName){
        return $this->$tableName;
    }*/

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
