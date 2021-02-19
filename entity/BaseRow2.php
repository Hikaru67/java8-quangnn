<?php


interface BaseRow2
{
    public function __set($property, $value);
    public function __get($property);
}