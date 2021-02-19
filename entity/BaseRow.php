<?php

include 'InterfaceEntity.php';

abstract class BaseRow implements InterfaceEntity
{
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

}