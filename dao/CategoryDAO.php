<?php

//include '../common/autoload.php';

class CategoryDAO
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

    public function insert(Category $row){

        if($this->database->insertTable(CATEGORY_TABLE, $row))
            return true;
        else
            return false;

    }

    public function update(Category $row){
        return  $this->database->updateTable(CATEGORY_TABLE, $row);
    }

    public function delete($id){
        return $this->database->deleteTable(CATEGORY_TABLE, $id);
    }

    public function findAll(){
        $tableName = CATEGORY_TABLE;
        return $this->database->$tableName;
    }

    public function findById($id){
        return $this->database->findById(CATEGORY_TABLE, $id);
    }
}
