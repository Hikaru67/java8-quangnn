<?php

include_once 'BaseDAO.php';

class ProductDAO extends BaseDAO
{

    public function __construct(Database &$database)
    {
        parent::__construct($database);
        $this->tableName = PRODUCT_TABLE;
    }

    public function getDatabase(): Database
    {
        return $this->database;
    }

    public function getTableName(): string
    {
        return $this->tableName;
    }
}