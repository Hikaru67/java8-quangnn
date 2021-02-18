<?php

include '../common/accessoryLoad.php';


class AccessoryDaoDemo
{
    protected $accessoryDao;

    public function __construct(AccessoryDAO $accessoryDAO)
    {
        $this->accessoryDao = $accessoryDAO;
    }

    public function insertTest(Accessory $row){
        if($this->accessoryDao->insert($row))
            echo "Insert success\n";
        else
            echo "Insert failed\n";
    }

    public function updateTest(Accessory $row){
        if($this->accessoryDao->update($row))
            echo "Update success\n";
        else
            echo "Update failed\n";
    }

    public function deleteTest($id){
        if($this->accessoryDao->delete($id))
            echo "Delete success\n";
        else
            echo "Delete failed\n";
    }

    public function findAllTest(){
        return $this->accessoryDao->findAll();
    }

    public function findByIdTest($id){
        return $this->accessoryDao->findById($id);
    }

    public function findByNameTest($name){
        return $this->accessoryDao->findByName($name);
    }

    public function searchTest($name){
        return $this->accessoryDao->search($name);
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