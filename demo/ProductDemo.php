<?php

require_once '../entity/Product.php';

class ProductDemo
{
    protected $productDemo;

    public function createProductTest(&$id, $name, &$categoryId){
        $this->productDemo = new Product($id++, $name, $categoryId++);
    }

    public function printProduct(){
        echo "ID: ".$this->productDemo->id."\nPRODUCT NAME: ".$this->productDemo->name."\nCATEGORY ID: ".$this->productDemo->categoryId."\n";
    }

}
$id = 1;
$categoryId = 10;
$productDemo = new ProductDemo();
$productDemo->createProductTest($id, 'asd', $categoryId);
$productDemo->printProduct();