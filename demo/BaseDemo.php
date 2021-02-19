<?php


abstract class BaseDemo
{
    protected $propertyDao;

    public function __construct($propertyDao)
    {
        $this->propertyDao = $propertyDao;
    }

    public function insertTest(BaseRow $row){
        if(!in_array(get_class($row), ENTITY_TYPE)){
            echo "Insert failed\n";
        }
        else{
            if($this->propertyDao->insert($row))
                echo "Insert success\n";
            else
                echo "Insert failed\n";
        }

    }

    public function updateTest(BaseRow $row){
        if(!in_array(get_class($row), ENTITY_TYPE)){
            echo "Update failed\n";
        }
        else{
            if($this->propertyDao->update($row))
                echo "Update success\n";
            else
                echo "Update failed\n";
        }

    }

    public function deleteTest($id){
        if($this->propertyDao->delete($id))
            echo "Delete success\n";
        else
            echo "Delete failed\n";
    }

    public function findAllTest(){
        return $this->propertyDao->findAll();
    }

    public function findByIdTest($id){
        return $this->propertyDao->findById($id);
    }

    public function findByNameTest($name){
        return $this->propertyDao->findByName($name);
    }

    public function searchTest($name){
        return $this->propertyDao->search($name);
    }
}