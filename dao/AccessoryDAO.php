<?php

include_once 'BaseDAO.php';

class AccessoryDAO extends BaseDAO
{

    public function __construct(Database &$database)
    {
        parent::__construct($database);
        $this->tableName = ACCESSORY_TABLE;
    }

}