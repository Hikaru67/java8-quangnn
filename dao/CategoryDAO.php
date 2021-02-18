<?php

include_once 'BaseDAO.php';

class CategoryDAO extends BaseDAO
{

    public function __construct(Database &$database)
    {
        parent::__construct($database);
        $this->tableName = CATEGORY_TABLE;
    }

}
