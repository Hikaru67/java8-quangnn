<?php

include '../common/categoryLoad.php';
include 'BaseDemo.php';

class CategoryDaoDemo extends BaseDemo
{

    public function __construct(CategoryDAO $propertyDao)
    {
        parent::__construct($propertyDao);
    }

}

$database = new Database();
$categoryDaoDemo = new CategoryDaoDemo(new CategoryDAO($database));
$categoryDaoDemo->insertTest(new Category(1, 'test'));
$categoryDaoDemo->insertTest(new Category(2, 'test 2'));
$categoryDaoDemo->insertTest(new Category(3, 'test 3'));
$categoryDaoDemo->updateTest(new Category(1, 'test 2'));
$categoryDaoDemo->deleteTest(2);
var_dump($categoryDaoDemo->findAllTest());
var_dump($categoryDaoDemo->findByIdTest(3));
var_dump($categoryDaoDemo->findByNameTest('test 2'));
var_dump($categoryDaoDemo->searchTest('test 2'));
