<?php

include 'InterfaceDAO.php';

abstract class BaseDAO implements InterfaceDAO
{
    protected $database;
    protected $tableName;

    protected function __construct(Database &$database)
    {
        $this->database = $database;
    }

    public function getDatabase(): Database
    {
        return $this->database;
    }

    public function getTableName(): string
    {
        return $this->tableName;
    }

    public function setDatabase($database)
    {
        $this->database = $database;
    }

    public function setTableName($tableName)
    {
        $this->tableName = $tableName;
    }

    public function insert(BaseRow $row){
        return $this->database->insertTable($this->tableName, $row);
    }

    public function update(BaseRow $row){
        return  $this->database->updateTable($this->tableName, $row);
    }

    public function delete($id): bool
    {
        return $this->database->deleteTable($this->tableName, $id);
    }

    public function findAll(){
        $tableName = $this->tableName;

        if($this->database->getTable($tableName)){
            return $this->database->getTable($tableName);
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