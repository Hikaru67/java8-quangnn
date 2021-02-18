<?php

include '../common/productLoad.php';
include 'BaseDemo.php';

class ProductDaoDemo extends BaseDemo
{

    public function __construct(ProductDAO $propertyDao)
    {
        parent::__construct($propertyDao);
    }

}

$database = new Database();
$productDaoDemo = new ProductDaoDemo(new ProductDAO($database));
$productDaoDemo->insertTest(new Product(1, 'test', 10));
$productDaoDemo->updateTest(new Product(1, 'test2', 10));
//$productDaoDemo->deleteTest(1);
var_dump($productDaoDemo->findAllTest());
var_dump($productDaoDemo->findByIdTest(1));
var_dump($productDaoDemo->findByNameTest('test2'));
var_dump($productDaoDemo->searchTest('test2'));