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
$accessoryDaoDemo->updateTest(new Accessory(1, 'test2'));
//$accessoryDaoDemo>deleteTest(1);
var_dump($accessoryDaoDemo->findAllTest());
var_dump($accessoryDaoDemo->findByIdTest(1));
var_dump($accessoryDaoDemo->findByNameTest('test2'));
var_dump($accessoryDaoDemo->searchTest('test2'));