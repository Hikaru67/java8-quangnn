<?php

include '../common/autoload.php';

class ProductDAO
{
    protected $database;

    public function __construct(Database &$database)
    {
        $this->database = $database;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function insert(Product $row){

        if($this->database->insertTable(PRODUCT_TABLE, $row))
            return true;
        else
            return false;

    }

    public function update(Product $row){
        return  $this->database->updateTable(PRODUCT_TABLE, $row);
    }

    public function delete($id){
        return $this->database->deleteTable(PRODUCT_TABLE, $id);
    }

    public function findAll(){
        $tableName = PRODUCT_TABLE;
        return $this->database->$tableName;
    }

    public function findById($id){
        return $this->database->findById(PRODUCT_TABLE, $id);
    }

    public function findByName($name){
        return $this->database->findByName(PRODUCT_TABLE, $name);
    }

    public function search($name){
        return $this->database->selectTable(PRODUCT_TABLE, $name);
    }
}