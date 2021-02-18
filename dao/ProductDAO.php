<?php

include_once 'BaseDAO.php';

class ProductDAO extends BaseDAO
{

    public function __construct(Database &$database)
    {
        parent::__construct($database);
        $this->tableName = PRODUCT_TABLE;
    }

}