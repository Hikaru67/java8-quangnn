<?php

function isValidTableName($tableName){
    if(in_array($tableName, TABLE_NAMES)){
        return true;
    }
        return false;
}

function isValidEntityType($entityType){
    if(in_array(get_class($entityType), ENTITY_TYPE)){
        return true;
    }
        return false;
}
