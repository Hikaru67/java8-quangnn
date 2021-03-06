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

    public function getDatabase(): Database
    {
        return $this->databaseTest;
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
        try {
            $amountRecord = 10;

            for ($i=1; $i<=$amountRecord; $i++){
                DatabaseDemo::insertTableTest(PRODUCT_TABLE, new Product($i, 'product test '.$i, $i*10));
                DatabaseDemo::insertTableTest(CATEGORY_TABLE, new Category($i, 'category test'.$i));
//                DatabaseDemo::insertTableTest(CATEGORY_TABLE, 5);
                DatabaseDemo::insertTableTest(ACCESSORY_TABLE, new Accessory($i, 'accessory test'.$i));
            }

        }catch (TypeError $e){
            echo $e->getMessage();
        }catch (Exception $e){
            echo $e->getMessage();
        }

    }

    public function printTableTest(){
        $productTable = PRODUCT_TABLE;
        $categoryTable = CATEGORY_TABLE;
        $accessoryTable = ACCESSORY_TABLE;

        if ($this->databaseTest->getTable($productTable)){
            echo "\nTABLE PRODUCT \n";
            echo "|Id\t|PRODUCT NAME\t|Category Id\t|\n";

                foreach ($this->databaseTest->getTable($productTable) as $product){
                echo "|".$product->getId()."\t|".$product->getName()."\t|".$product->getCategoryId()."\t\t|\n";
            }
        }

        if ($this->databaseTest->getTable($categoryTable)){
            echo "\nTABLE CATEGORY \n";
            echo "|Id\t|CATEGORY NAME\t|\n";

            foreach ($this->databaseTest->getTable($categoryTable) as $category){
                echo "|".$category->getId()."\t|".$category->getName()."\t|\n";
            }
        }

        if ($this->databaseTest->getTable($accessoryTable)){
            echo "\nTABLE ACCESSORY \n";
            echo "|Id\t|ACCESSORY NAME\t|\n";

            foreach ($this->databaseTest->getTable($accessoryTable) as $accessory){
                echo "|".$accessory->getId()."\t|".$accessory->getName()."|\n";
            }
        }

    }
}

$databaseDemo = new DatabaseDemo(Database::createDatabase());
//$databaseDemo->insertTableTest();
$databaseDemo->initDatabase();
$databaseDemo->updateTableTest(CATEGORY_TABLE, new Category(1, 'category update'));
$databaseDemo->printTableTest();
