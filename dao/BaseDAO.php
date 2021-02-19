<?php

include 'InterfaceDAO.php';

abstract class BaseDAO implements InterfaceDAO
{
    protected $database;
    protected $tableName;

    public function __construct(Database &$database)
    {
        $this->database = $database;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function insert($row){

        if(!in_array(get_class($row), ENTITY_TYPE)){
            return false;
        }
            return $this->database->insertTable($this->tableName, $row);

    }

    public function update($row){
        if(!in_array(get_class($row), ENTITY_TYPE)){
            return false;
        }
            return  $this->database->updateTable($this->tableName, $row);

    }

    public function delete($id){
        return $this->database->deleteTable($this->tableName, $id);
    }

    public function findAll(){
        $tableName = $this->tableName;

        if($this->database->$tableName){
            return $this->database->$tableName;
        }
            return false;
    }

    public function findById($id){
        return $this->database->findById($this->tableName, $id);
    }

    public function findByName($name){
        return $this->database->findByName($this->tableName, $name);
    }

    public function search($name){
        return $this->database->selectTable($this->tableName, $name);
    }
}