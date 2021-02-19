<?php

include '../dao/Database.php';
include '../common/required.php';

class DatabaseDemo
{

    protected $databaseTest;

    public function __construct(Database $database)
    {
        $this->databaseTest = $database;
    }

    public function __get($property)
    {
        return $this->$property;
    }

    public function insertTableTest($name, $row)
    {
        $this->databaseTest->insertTable($name, $row);
    }

    public function selectTableTest($name, $where)
    {
        $this->databaseTest->selectTable($name, $where);
    }

    public function updateTableTest($name, $row)
    {
        return $this->databaseTest->updateTable($name, $row);
    }

    public function deleteTableTest($name, $row)
    {
        $this->databaseTest->deleteTable($name, $row);
    }

    public function truncateTableTest($name)
    {
        $this->databaseTest->truncateTable($name);
    }

    public function initDatabase(){
        $amountRecord = 10;

        for ($i=1; $i<=$amountRecord; $i++){
            DatabaseDemo::insertTableTest(PRODUCT_TABLE, new Product($i, 'product test '.$i, $i*10));
            DatabaseDemo::insertTableTest(CATEGORY_TABLE, new Category($i, 'category test'.$i));
            DatabaseDemo::insertTableTest(ACCESSORY_TABLE, new Accessory($i, 'accessory test'.$i));
        }

    }

    public function printTableTest(){
        $productTable = PRODUCT_TABLE;
        $categoryTable = CATEGORY_TABLE;
        $accessoryTable = ACCESSORY_TABLE;

        if ($this->databaseTest->$productTable){
            echo "\nTABLE PRODUCT \n";
            echo "|Id\t|PRODUCT NAME\t|Category Name\t|\n";

                foreach ($this->databaseTest->$productTable as $product){
                echo "|$product->id\t|$product->name\t|$product->categoryId\t\t|\n";
            }
        }

        if ($this->databaseTest->$categoryTable){
            echo "\nTABLE CATEGORY \n";
            echo "|Id\t|CATEGORY NAME\t|\n";

            foreach ($this->databaseTest->$categoryTable as $category){
                echo "|$category->id\t|$category->name\t|\n";
            }
        }

        if ($this->databaseTest->$accessoryTable){
            echo "\nTABLE ACCESSORY \n";
            echo "|Id\t|ACCESSORY NAME\t|\n";

            foreach ($this->databaseTest->$accessoryTable as $accessory){
                echo "|$accessory->id\t|$accessory->name|\n";
            }
        }

    }
}

$databaseDemo = new DatabaseDemo(new Database());
//$databaseDemo->insertTableTest();
$databaseDemo->initDatabase();
$databaseDemo->updateTableTest(CATEGORY_TABLE, new Category(1, 'category update'));
$databaseDemo->printTableTest();
