<?php

include_once 'BaseDAO.php';

class AccessoryDAO extends BaseDAO
{

    public function __construct(Database &$database)
    {
        parent::__construct($database);
        $this->tableName = ACCESSORY_TABLE;
    }

    public function getDatabase(): Database
    {
        return $this->database;
    }

    public function getTableName(): string
    {
        return $this->tableName;
    }

    public function __get($name)
    {
        return $this->$name;
    }

}