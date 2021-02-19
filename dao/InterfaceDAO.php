<?php


interface InterfaceDAO
{
    public function insert(BaseRow $row);
    public function update(BaseRow $row);
    public function delete($id);
    public function findAll();
    public function findById($id);
    public function findByName($name);
    public function search($name);
}