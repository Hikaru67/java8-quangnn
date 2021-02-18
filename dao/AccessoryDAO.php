<?php

//include '../common/autoload.php';

class AccessoryDAO
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

    public function insert(Accessory $row){

        if($this->database->insertTable(ACCESSORY_TABLE, $row))
            return true;
        else
            return false;

    }

    public function update(Accessory $row){
        return  $this->database->updateTable(ACCESSORY_TABLE, $row);
    }

    public function delete($id){
        return $this->database->deleteTable(ACCESSORY_TABLE, $id);
    }

    public function findAll(){
        $tableName = ACCESSORY_TABLE;
        return $this->database->$tableName;
    }

    public function findById($id){
        return $this->database->findById(ACCESSORY_TABLE, $id);
    }

    public function findByName($name){
        return $this->database->findByName(ACCESSORY_TABLE, $name);
    }

    public function search($name){
        return $this->database->selectTable(ACCESSORY_TABLE, $name);
    }
}