<?php

include '../common/categoryLoad.php';


class CategoryDaoDemo
{
    protected $categoryDAO;

    public function __construct(CategoryDAO $categoryDAO)
    {
        $this->categoryDAO = $categoryDAO;
    }

    public function insertTest(Category $row){
        if($this->categoryDAO->insert($row))
            echo "Insert success\n";
        else
            echo "Insert failed\n";
    }

    public function updateTest(Category $row){
        if($this->categoryDAO->update($row))
            echo "Update success\n";
        else
            echo "Update failed\n";
    }

    public function deleteTest($id){
        if($this->categoryDAO->delete($id))
            echo "Delete success\n";
        else
            echo "Delete failed\n";
    }

    public function findAllTest(){
        return $this->categoryDAO->findAll();
    }

    public function findByIdTest($id){
        return $this->categoryDAO->findById($id);
    }

}

$database = new Database();
$categoryDaoDemo = new CategoryDaoDemo(new CategoryDAO($database));
$categoryDaoDemo->insertTest(new Category(1, 'test'));
$categoryDaoDemo->updateTest(new Category(1, 'test2'));
//$categoryDaoDemo->deleteTest(1);
//var_dump($categoryDaoDemo->findAllTest());
var_dump($categoryDaoDemo->findByIdTest(1));
