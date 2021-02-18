<?php

include '../common/productLoad.php';

class ProductDaoDemo
{
    protected $productDao;

    public function __construct(ProductDAO $productDAO)
    {
        $this->productDao = $productDAO;
    }

    public function insertTest(Product $row){
        if($this->productDao->insert($row))
            echo "Insert success\n";
        else
            echo "Insert failed\n";
    }

    public function updateTest(Product $row){
        if($this->productDao->update($row))
            echo "Update success\n";
        else
            echo "Update failed\n";
    }

    public function deleteTest($id){
        if($this->productDao->delete($id))
            echo "Delete success\n";
        else
            echo "Delete failed\n";
    }

    public function findAllTest(){
        return $this->productDao->findAll();
    }

    public function findByIdTest($id){
        return $this->productDao->findById($id);
    }

    public function findByNameTest($name){
        return $this->productDao->findByName($name);
    }

    public function searchTest($name){
        return $this->productDao->search($name);
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