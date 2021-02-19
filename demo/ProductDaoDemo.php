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
$productDaoDemo->insertTest(new Product(1, 'test', 11));
$productDaoDemo->insertTest(new Product(2, 'test 2', 12));
$productDaoDemo->insertTest(new Product(3, 'test 3', 13));
$productDaoDemo->updateTest(new Product(1, 'test 2', 10));
$productDaoDemo->deleteTest(3);
var_dump($productDaoDemo->findAllTest());
var_dump($productDaoDemo->findByIdTest(1));
var_dump($productDaoDemo->findByNameTest('test 2'));
var_dump($productDaoDemo->searchTest('test 2'));