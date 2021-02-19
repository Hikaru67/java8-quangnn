<?php

include '../common/accessoryLoad.php';
include 'BaseDemo.php';

class AccessoryDaoDemo extends BaseDemo
{

    public function __construct(AccessoryDAO $propertyDao)
    {
        parent::__construct($propertyDao);
    }

}

$database = new Database();
$accessoryDaoDemo = new AccessoryDaoDemo(new AccessoryDAO($database));
$accessoryDaoDemo->insertTest(new Accessory(1, 'test'));
$accessoryDaoDemo->insertTest(new Accessory(2, 'test 2'));
$accessoryDaoDemo->insertTest(new Accessory(3, 'test 3'));
$accessoryDaoDemo->updateTest(new Accessory(1, 'test 2'));
$accessoryDaoDemo->deleteTest(3);
var_dump($accessoryDaoDemo->findAllTest());
var_dump($accessoryDaoDemo->findByIdTest(2));
var_dump($accessoryDaoDemo->findByNameTest('test 2'));
var_dump($accessoryDaoDemo->searchTest('test 2'));