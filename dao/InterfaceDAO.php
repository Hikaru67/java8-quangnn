<?php


interface InterfaceDAO
{
    public function __construct(Database &$database);
    public function __get($name);
    public function insert($row);
    public function update($row);
    public function delete($id);
    public function findAll();
    public function findById($id);
    public function findByName($name);
    public function search($name);
}