<?php

class Model_ArticleMapper
{
  
  function __construct() {
    
  }
  
  //public function save($model);
  //public function find($id, $model);
  
  public function fetchAll()
  {
    $db = new Model_DbTable_Article();
    $resultSet = $db->fetchAll();
    
    $entries = array();
    foreach ( $resultSet as $row )
    {
      $entry = new Model_Article();
      $entry->setId($row[0])
          ->setTitle($row[1])
          ->setLead($row[2])
          ->setBody($row[3])
          ->setAuthor($row[4]);
      $entries[] = $entry;
    }
    
    return $entries; 
  }
}

